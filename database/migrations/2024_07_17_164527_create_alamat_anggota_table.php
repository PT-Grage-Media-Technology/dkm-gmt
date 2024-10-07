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
        Schema::create('alamat_anggota', function (Blueprint $table) {
            $table->id('id_alamatanggota');
            $table->unsignedInteger('anggota_id');
            $table->string('alamat_lengkap')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('provinsi')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('anggota_id')->references('id_anggota')->on('anggotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_anggota');
    }
};
