<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLominTable extends Migration
{
    public function up()
    {
        Schema::create('lomin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('profile_admin')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lomin');
    }
}
