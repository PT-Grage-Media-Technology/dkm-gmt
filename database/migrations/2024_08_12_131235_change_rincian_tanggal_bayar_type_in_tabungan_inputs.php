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
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            $table->date('rincian_tanggal_bayar')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            $table->string('rincian_tanggal_bayar')->change();
        });
    }
};
