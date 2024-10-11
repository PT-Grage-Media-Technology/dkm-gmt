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
            $table->decimal('minus_pembayaran', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungan_inputs', function (Blueprint $table) {
            $table->decimal('minus_pembayaran', 10, 2)->change(); // Assuming you want to make it not nullable
        });
    }
};