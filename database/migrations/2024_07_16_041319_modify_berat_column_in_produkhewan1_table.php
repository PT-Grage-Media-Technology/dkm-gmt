<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBeratColumnInProdukhewan1Table extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produkhewan1', function (Blueprint $table) {
            $table->string('berat')->change(); // Mengubah tipe data kolom 'berat' menjadi string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produkhewan1', function (Blueprint $table) {
            $table->integer('berat')->change(); // Mengembalikan tipe data kolom 'berat' menjadi integer jika rollback
        });
    }
}
