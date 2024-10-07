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
            $table->unsignedBigInteger('tabungan_kur_id')->after('id_tabunganinputs');

            // Optional: Add foreign key constraint
            $table->foreign('tabungan_kur_id')->references('id')->on('tabungankurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            $table->dropForeign(['tabungan_kur_id']);
            $table->dropColumn('tabungan_kur_id');
        });
    }
};
