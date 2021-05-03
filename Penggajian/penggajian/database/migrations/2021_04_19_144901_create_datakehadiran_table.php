<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakehadiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan');
            $table->string('nik');
            $table->string('nama_karyawan');
            $table->string('jenis_kelamin');
            $table->string('nama_jabatan');
            $table->integer('hadir');
            $table->integer('sakit');
            $table->integer('apha');
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
        Schema::dropIfExists('datakehadiran');
    }
}
