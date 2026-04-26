<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Ditambah nullable() agar produk lama yang belum punya label/varian tidak error
            $table->foreignId('label_id')->nullable()->constrained('labels')->nullOnDelete();
            $table->foreignId('variant_id')->nullable()->constrained('variants')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['label_id']);
            $table->dropForeign(['variant_id']);
            $table->dropColumn(['label_id', 'variant_id']);
        });
    }
};