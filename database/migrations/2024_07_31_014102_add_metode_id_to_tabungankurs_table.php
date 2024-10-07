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
        Schema::table('tabungankurs', function (Blueprint $table) {
            $table->unsignedBigInteger('metode_id')->after('id');

            $table->foreign('metode_id')->references('id')->on('metode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungankurs', function (Blueprint $table) {
            $table->dropForeign(['metode_id']);
            $table->dropColumn('metode_id');
        });
    }
};
