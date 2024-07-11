<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->integer('jam_mulai');
            $table->integer('jam_akhir');
            $table->unsignedBigInteger('id_matkul');
            $table->dateTime('tahun_akademik');
            $table->integer('jumlah-peserta');
            $table->timestamps();

            $table->foreign('id_matkul')->references('id')->on('matakuliahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_matkul']);
        });
        Schema::dropIfExists('jadwal');
    }
}
