<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tabungankurs', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->nullable(); // Menambahkan kolom produk_id
            $table->foreign('produk_id')->references('id')->on('produkhewan1'); // Menambahkan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungankurs', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
        });
    }
};
