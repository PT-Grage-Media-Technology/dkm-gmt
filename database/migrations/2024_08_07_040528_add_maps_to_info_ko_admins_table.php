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
        Schema::table('info_ko_admins', function (Blueprint $table) {
            // Mengubah tipe data kolom 'maps' dari string menjadi text
            $table->text('maps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_ko_admins', function (Blueprint $table) {
            // Mengembalikan tipe data kolom 'maps' menjadi string dengan panjang 255
            $table->dropColumn('maps');
        });
    }
};
