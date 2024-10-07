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
        Schema::create('data_transaksi', function (Blueprint $table) {
            $table->id('id_dataTransaksi');
            $table->unsignedBigInteger('admin_id');
            $table->string('no_rekening')->unique();
            $table->string('no_dana');
            $table->timestamps();

            $table->foreign('admin_id')->references('id_admin')->on('lomin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transaksi');
    }
};
