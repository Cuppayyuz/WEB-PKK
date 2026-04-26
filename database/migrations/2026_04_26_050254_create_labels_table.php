<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: New, Special, Best Seller
            $table->string('color')->default('#8A1A9A'); // Untuk background khusus dropdown/badge
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('labels');
    }
};