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
        Schema::create('tabungankurs', function (Blueprint $table) {
            $table->id();
            $table->date('awal_waktu_tabungan');
            $table->string('target_waktu_tabungan');
            $table->decimal('jumlah_cicilan_bulan',15, 2);
            $table->string('metode_tabungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungankurs');
    }
};
