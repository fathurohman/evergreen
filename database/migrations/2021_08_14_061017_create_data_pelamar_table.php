<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pelamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_post_lowongan');
            $table->foreignId('id_bagian');
            $table->string('nik');
            $table->string('nama');
            $table->integer('umur');
            $table->string('foto_ktp');
            $table->string('cv');
            $table->string('status');
            $table->string('jawaban1');
            $table->string('jawaban2');
            $table->string('jawaban3');
            $table->string('jawaban4');
            $table->string('jawaban5');
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
        Schema::dropIfExists('data_pelamar');
    }
}
