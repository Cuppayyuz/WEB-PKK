<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    // Ambil produk dan kategori dari database
    $products = App\Models\Product::with(['category', 'label'])->latest()->get();
    $categories = App\Models\Category::all(); // <-- Tambahkan baris ini
    
    return view('welcome', compact('products', 'categories')); // <-- Tambahkan 'categories' ke compact
});

Route::post('/contact', [MessageController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:3,10');

Route::get('/paksa-keluar', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return "Sesi login berhasil dihapus total! Sekarang coba buka 127.0.0.1:8000/login";
});
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);        
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    # Dashboard
    Route::get('/dashboard', function () {
        // 1. Ambil semua data master untuk produk
        $products = App\Models\Product::with(['category', 'label', 'variant'])->latest()->get();
        $categories = App\Models\Category::all();
        $labels = App\Models\Label::all();
        $variants = App\Models\Variant::all();
        
        // 2. Ambil data ringkasan pesanan (Tambahan Baru)
        $totalOrders = App\Models\Order::count();
        $totalRevenue = App\Models\Order::sum('total_price');
        
        // 3. Kirim semuanya ke view
        return view('admin.dashboard', compact(
            'products', 
            'categories', 
            'labels', 
            'variants', 
            'totalOrders', 
            'totalRevenue'
        )); 
    })->name('admin.dashboard');

    #CRUD Label
    Route::get('/labels', [LabelController::class, 'index'])->name('admin.labels.index');
    Route::post('/labels', [LabelController::class, 'store'])->name('admin.labels.store');
    Route::put('/labels/{label}', [LabelController::class, 'update'])->name('admin.labels.update');
    Route::delete('/labels/{label}', [LabelController::class, 'destroy'])->name('admin.labels.destroy');

    #CRUD Variant
    Route::get('/variants', [VariantController::class, 'index'])->name('admin.variants.index');
    Route::post('/variants', [VariantController::class, 'store'])->name('admin.variants.store');
    Route::put('/variants/{variant}', [VariantController::class, 'update'])->name('admin.variants.update');
    Route::delete('/variants/{variant}', [VariantController::class, 'destroy'])->name('admin.variants.destroy');
    #orders
    // ROUTE CRUD ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    // Khusus untuk ganti status pesanan (Pending -> Success, dll)
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.status');

    # ROUTE CRUD KATEGORI
    Route::get('/kategori', [CategoryController::class, 'index'])->name('admin.kategori');
    Route::post('/kategori', [CategoryController::class, 'store'])->name('admin.kategori.store');
    Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('admin.kategori.destroy');
    // Menampilkan halaman form edit
    Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])->name('admin.kategori.edit');
    // Menerima data dan mengupdate ke database
    Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('admin.kategori.update');

    # ROUTE CRUD PRODUK
    Route::get('/produk', [ProductController::class, 'index'])->name('admin.produk');
    Route::get('/produk/create', [ProductController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('admin.produk.destroy');
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
});