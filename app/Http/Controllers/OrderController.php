<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Variant;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap filter status dari URL (misal: ?status=pending)
        $status = $request->query('status');

        // Ambil data order beserta detail item dan produknya (Eager Loading)
        $orders = Order::with('items.product')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->get();

        // Ambil produk yang stoknya masih ada untuk ditampilkan di form
        $products = Product::where('stock', '>', 0)->get();
        $variants = Variant::all();

        return view('admin.orders', compact('orders', 'products', 'status', 'variants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'variant' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
            // 1. Buat Order Induk (Total harga sementara 0)
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'total_price' => 0,
                'status' => 'pending',
            ]);

            $totalPrice = 0;

            // 2. Looping item barang yang dipesan
            foreach ($request->product_id as $key => $prod_id) {
                $product = Product::findOrFail($prod_id);
                $qty = $request->quantity[$key];
                $variant = $request->variant[$key] ?? null;

                // Cek stok (mencegah user beli lebih dari stok)
                if ($product->stock < $qty) {
                    throw new \Exception("Stok {$product->name} tidak cukup!");
                }

                // Buat Order Item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'variant' => $variant,
                    'quantity' => $qty,
                    'price' => $product->price, // Kunci harga saat ini
                ]);

                // Kurangi stok produk
                $product->decrement('stock', $qty);

                // Hitung total harga
                $totalPrice += ($product->price * $qty);
            }

            // 3. Update total harga di Order Induk
            $order->update(['total_price' => $totalPrice]);

            DB::commit();
            return redirect()->route('admin.orders')->with('success', 'Pesanan berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,processing,success,failed']);
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan diperbarui!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Kembalikan stok barang yang dibatalkan
        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        $order->delete(); // OrderItem otomatis terhapus karena onDelete('cascade')
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus dan stok dikembalikan.');
    }
}