<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    // Menampilkan halaman daftar varian
    public function index()
    {
        $variants = Variant::latest()->get();
        return view('admin.variants', compact('variants'));
    }

    // Menyimpan varian baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Variant::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.variants.index')->with('success', 'Varian baru berhasil ditambahkan!');
    }

    // Update varian
    public function update(Request $request, Variant $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $variant->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.variants.index')->with('success', 'Varian berhasil diperbarui!');
    }

    // Menghapus varian
    public function destroy(Variant $variant)
    {
        $variant->delete();
        return redirect()->route('admin.variants.index')->with('success', 'Varian berhasil dihapus!');
    }
}