<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatabunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatabungan', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama tabungan
            $table->string('jenis'); // Jenis tabungan
            $table->integer('jumlah'); // Jumlah tabungan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datatabungan');
    }
}

