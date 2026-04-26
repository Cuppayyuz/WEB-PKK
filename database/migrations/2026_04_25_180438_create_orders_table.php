<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID bawaan, nanti di-format jadi #ORD001 di tampilan
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->integer('total_price')->default(0);
            $table->enum('status', ['pending', 'processing', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};