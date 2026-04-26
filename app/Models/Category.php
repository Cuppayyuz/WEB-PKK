<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk memberi izin kolom mana saja yang boleh diisi
    protected $fillable = ['name', 'color_hex']; 
}