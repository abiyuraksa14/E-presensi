<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->string('id_matkul');
            $table->integer('tahun_akademik');
            $table->integer('jumlah_peserta')->nullable();
            $table->timestamps();

            $table->foreign('id_matkul')->references('kd_matkul')->on('matakuliahs')->onDelete('cascade');
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
        Schema::dropIfExists('jadwals');
    }
}
