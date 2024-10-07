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
            // $table->enum('status_persetujuan', ['Disetujui', 'Tidak Disetujui'])->nullable()->after('jumlah_cicilan_bulan');
            $table->enum('status_persetujuan', ['pending', 'Disetujui', 'Tidak Disetujui'])->default('pending')->after('jumlah_cicilan_bulan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungankurs', function (Blueprint $table) {
            $table->dropColumn('status_persetujuan');
        });
    }
};
