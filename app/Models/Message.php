<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk memberi izin kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}