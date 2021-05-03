<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatajabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datajabatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_jabatan');
            $table->string('gaji_pokok');
            $table->string('tunjangan');
            $table->string('uang_makan');
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
        Schema::dropIfExists('datajabatan');
    }
}
