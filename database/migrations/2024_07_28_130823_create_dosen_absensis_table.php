<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenAbsensisTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_jadwal');
            $table->string('id_matakuliah');
            $table->date('tanggal_absen');
            $table->time('waktu_absen_masuk');
            $table->time('waktu_absen_keluar')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_dosen')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->foreign('id_matakuliah')->references('kd_matkul')->on('matakuliahs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_absensis');
    }
}

