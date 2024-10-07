<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToInfoKoAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('info_ko_admins', function (Blueprint $table) {
            $table->string('email')->nullable(); // Atur sesuai kebutuhan, bisa juga default
        });
    }

    public function down()
    {
        Schema::table('info_ko_admins', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
