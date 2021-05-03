<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_pegawai')->insert([
            'nik' => mt_rand(),
            'nama_pegawai' => 'admin',
            'password' => Hash::make('admin'),
            'jenis_kelamin' => 'Laki-Laki',
            'jabatan' => 'Sekretaris',
            'tanggal_masuk' => '2021-08-22',
            'status' => 'Pegawai Tetap',
            'level' => 'admin',
            'photo' => 'undraw_profile_1619019631.svg',
        ]);
    }
}
