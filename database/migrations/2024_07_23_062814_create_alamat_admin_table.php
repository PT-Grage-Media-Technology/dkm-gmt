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
        Schema::create('alamat_admin', function (Blueprint $table) {
            $table->id('id_alamatadmin');
            $table->unsignedBigInteger('admin_id'); // Perbaikan tipe data di sini
            $table->string('alamat_lengkap')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('provinsi')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('admin_id')->references('id_admin')->on('lomin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_admin');
    }
};
