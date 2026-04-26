<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    // Menampilkan halaman daftar label
    public function index()
    {
        $labels = Label::latest()->get();
        return view('admin.labels', compact('labels'));
    }

    // Menyimpan label baru dari form tambah
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:labels,name'
        ]);

        Label::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.labels.index')->with('success', 'Label baru berhasil ditambahkan!');
    }

    // Update label (dijalankan lewat modal pop-up tadi)
    public function update(Request $request, Label $label)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:labels,name,' . $label->id
        ]);

        $label->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.labels.index')->with('success', 'Label berhasil diperbarui!');
    }

    // Menghapus label
    public function destroy(Label $label)
    {
        $label->delete();
        return redirect()->route('admin.labels.index')->with('success', 'Label berhasil dihapus!');
    }
}