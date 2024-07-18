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
            $table->string('kd_matkul');
            $table->string('nama_mhs');
            $table->string('nidn');
            $table->string('jumlahp');
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
