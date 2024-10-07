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
        Schema::create('bukti_pembayarans', function (Blueprint $table) {
            $table->id('id_buktipembayaran');
            $table->unsignedBigInteger('tabungankurs_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tabungan_input_id')->nullable(); // Kolom baru yang dapat bernilai null
            $table->string('bukti_transaksi');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('tabungankurs_id')->references('id')->on('tabungankurs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tabungan_input_id')->references('id_tabunganinputs')->on('tabungan_inputs')->onDelete('set null'); // Relasi baru dengan tabungan_inputs
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_pembayarans');
    }
};
