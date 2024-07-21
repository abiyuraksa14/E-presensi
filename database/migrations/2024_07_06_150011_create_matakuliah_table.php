<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->string('kd_matkul')->unique();
            $table->primary('kd_matkul');
            $table->string('nama_matkul');
            $table->integer('sks');
            $table->string('semester');
            $table->integer('durasi');
            $table->string('nidn_id');
            $table->timestamps();

            $table->foreign('nidn_id')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}
