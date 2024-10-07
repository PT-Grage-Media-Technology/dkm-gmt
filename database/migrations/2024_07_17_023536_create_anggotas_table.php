<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id_anggota');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('profile_anggota')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}

