<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan halaman kelola kategori
    public function index()
    {
        $categories = Category::latest()->get();
        // Pastikan nama view di bawah ini sesuai dengan nama file blade kategori kamu
        return view('admin.kategori', compact('categories')); 
    }

    // Fungsi store yang dicari oleh Laravel untuk menyimpan data
    public function store(Request $request)
    {
        // 1. Validasi inputan dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'color_hex' => 'nullable|string|max:7', // untuk warna background misal: #FFFFFF
        ]);

        // 2. Simpan ke database
        Category::create([
            'name' => $request->name,
            'color_hex' => $request->color_hex ?? '#8c8c8c', // pakai warna default jika kosong
        ]);

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    // Fungsi untuk menghapus kategori
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success', 'Kategori berhasil dihapus!');
    }

    // Menampilkan halaman form edit kategori
    public function edit($id)
    {
        // Cari data kategori berdasarkan ID
        $category = Category::findOrFail($id);
        
        // Lempar datanya ke view (Pastikan kamu bikin file edit.blade.php nanti)
        // Atau jika kamu pakai modal Javascript, fungsi ini bisa diubah untuk return response()->json($category);
        return view('admin.kategori-edit', compact('category')); 
    }

    // Menyimpan perubahan data kategori ke database
    public function update(Request $request, $id)
    {
        // 1. Validasi data baru
        $request->validate([
            'name' => 'required|string|max:255',
            'color_hex' => 'nullable|string|max:7',
        ]);

        // 2. Cari data lama, lalu timpa dengan data baru
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'color_hex' => $request->color_hex ?? '#8c8c8c',
        ]);

        // 3. Kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui!');
    }
}