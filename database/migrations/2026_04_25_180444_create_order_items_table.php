<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // Sambungkan ke tabel orders
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            // Sambungkan ke tabel products
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('variant')->nullable(); // Keju, Coklat, dll
            $table->integer('quantity');
            $table->integer('price'); // Harga saat barang dibeli (biar histori harga gak berubah kalau harga produk naik)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};