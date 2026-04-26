<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 1. Izin Mass Assignment (Sesuai kolom di migration kamu)
    protected $fillable = [
        'category_id', 
        'label_id',
        'variant_id',
        'name', 
        'price', 
        'stock', 
        'description', 
        'image_path'
    ];

    // 2. Relasi ke Model Category (Satu produk punya satu kategori)
    public function category(){ return $this->belongsTo(Category::class);}
    public function label() { return $this->belongsTo(Label::class); }
    public function variant() { return $this->belongsTo(Variant::class); }
}