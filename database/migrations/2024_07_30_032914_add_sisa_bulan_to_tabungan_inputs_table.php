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
            $table->integer('sisa_bulan')->default(0)->after('minus_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            $table->dropColumn('sisa_bulan');
        });
    }
};
