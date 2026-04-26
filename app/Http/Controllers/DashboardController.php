<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    $products = Product::with('category')->latest()->get();
    $categories = Category::all();
    $totalOrders = Order::count(); // Menghitung jumlah pesanan
    $totalRevenue = Order::sum('total_price'); // Menghitung total uang masuk

    return view('admin.dashboard', compact('products', 'totalOrders', 'totalRevenue'));

    }
}
