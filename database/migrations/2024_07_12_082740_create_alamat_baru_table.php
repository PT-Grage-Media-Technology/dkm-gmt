<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id('id_alamat');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('alamat_lengkap')->nullable(); // Menjadikan kolom nullable
            $table->string('rt')->nullable(); // Menjadikan kolom nullable
            $table->string('rw')->nullable(); // Menjadikan kolom nullable
            $table->string('kelurahan')->nullable(); // Menjadikan kolom nullable
            $table->string('kabupaten')->nullable(); // Menjadikan kolom nullable
            $table->string('kecamatan')->nullable(); // Menjadikan kolom nullable
            $table->string('provinsi')->nullable(); // Menjadikan kolom nullable
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alamat');
    }
};
