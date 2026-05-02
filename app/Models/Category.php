<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Tambahkan ini agar tidak error saat create()
    protected $fillable = [
        'name',
        'color_hex',
    ];
}