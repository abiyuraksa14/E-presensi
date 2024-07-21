<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->string('id_matkul');
            $table->unsignedBigInteger('id_jadwal');
            $table->date('tanggal_absen');
            $table->dateTime('waktu_absen_masuk')->nullable();
            $table->dateTime('waktu_absen_keluar')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_matkul')->references('kd_matkul')->on('matakuliahs')->onDelete('cascade');
            $table->foreign('id_peserta')->references('id')->on('persertas')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
