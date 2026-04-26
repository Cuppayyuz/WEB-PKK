<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Wajib panggil kategori untuk pilihan dropdown
use Illuminate\Support\Facades\Storage; // Wajib untuk urus hapus file foto
use App\Models\Label;
use App\Models\Variant;

class ProductController extends Controller
{
    // READ (Tampil Tabel)
    public function index()
    {
        // Pakai with('category') agar load relasinya cepat (Eager Loading)
        $products = Product::with('category')->latest()->get();
        $labels = Label::all(); // Ambil data label
        $variants = Variant::all(); // Ambil data varian
        return view('admin.produk.index', compact('products', 'labels', 'variants'));
    }

    // FORM TAMBAH (Kirim data kategori untuk dropdown)
    public function create()
    {
        $categories = Category::all();
        return view('admin.produk.create', compact('categories'));
    }

    // CREATE (Simpan Data + Upload Foto)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'label_id' => 'nullable', // Boleh kosong
            'variant_id' => 'nullable', // Boleh kosong
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5128', // Maks 5MB
        ]);

        $data = $request->except('image'); // Ambil semua input kecuali foto

        // Jika user upload foto
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.produk.edit', compact('product', 'categories'));
    }

    // UPDATE (Simpan Perubahan + Ganti Foto Lama)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'label_id' => 'nullable',
            'variant_id' => 'nullable',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5128',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus foto lama di folder storage jika ada
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            // Simpan foto baru
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diperbarui!');
    }

    // DELETE (Hapus Data + Hapus Foto)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file foto fisiknya biar nggak menuhin memori server
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus!');
    }
}