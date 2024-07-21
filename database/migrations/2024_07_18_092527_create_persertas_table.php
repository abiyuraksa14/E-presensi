<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persertas', function (Blueprint $table) {
            $table->id();
            $table->string('id_matkul');
            $table->string('id_mahasiswa');
            $table->timestamps();

            $table->foreign('id_matkul')->references('kd_matkul')->on('matakuliahs')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('username')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persertas');
    }
}
