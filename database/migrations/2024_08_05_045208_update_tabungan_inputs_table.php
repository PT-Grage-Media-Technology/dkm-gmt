<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            // Menambahkan kolom baru jika belum ada
          
            $table->string('rincian_tanggal_bayar')->nullable()->change();
            $table->decimal('total_bayar', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan
            $table->string('rincian_tanggal_bayar')->nullable(false)->change();
            $table->decimal('total_bayar', 10, 2)->nullable(false)->change();
        });
    }
};
