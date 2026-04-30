<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Simpan pesan dari form Contact Us (Guest)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($data);

        return back()->with('success', 'Pesanmu sudah terkirim! Terima kasih ya.');
    }

    // Tampilkan daftar pesan di Admin
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // Hapus pesan
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}