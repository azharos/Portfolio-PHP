<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', '50');
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->string('jabatan');
            $table->date('tanggal_masuk');
            $table->string('status');
            $table->string('photo');
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
        Schema::dropIfExists('datapegawai');
    }
}
