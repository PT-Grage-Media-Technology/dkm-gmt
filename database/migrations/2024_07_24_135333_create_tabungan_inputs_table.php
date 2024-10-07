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
    Schema::create('tabungan_inputs', function (Blueprint $table) {
        $table->id('id_tabunganinputs');
        $table->unsignedBigInteger('user_id');
        $table->date('rincian_tanggal_bayar');
        $table->decimal('total_bayar', 15, 2);
        $table->decimal('minus_pembayaran', 15, 2);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungan_inputs');
    }
};
