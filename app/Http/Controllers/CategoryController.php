<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Pastikan ini ada

class CategoryController extends Controller
{
    // 1. FUNGSI INDEX: Untuk menampilkan halaman dan data
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.kategori', compact('categories'));
    }

    // 2. FUNGSI STORE: Untuk menyimpan data dari form
    public function destroy($id)
    {
        // 1. Cari kategori berdasarkan ID-nya
        $category = Category::findOrFail($id);
        
        // 2. Hapus dari database
        $category->delete();

        // 3. Kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus!');
    }

    // 1. Fungsi untuk membuka halaman edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.kategori-edit', compact('category'));
    }

    // 2. Fungsi untuk menyimpan perubahan data
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'color_hex' => 'nullable|string'
        ]);

        // Cari data lama, lalu timpa dengan data baru
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'color_hex' => $request->color_hex ?? '#8c8c8c',
        ]);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui!');
    }
}