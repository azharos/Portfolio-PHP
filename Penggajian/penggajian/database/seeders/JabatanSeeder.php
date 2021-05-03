<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_jabatan')->insert([
            'nama_jabatan' => 'Sekretaris',
            'gaji_pokok' => 4000000,
            'tunjangan' => 800000,
            'uang_makan' => 500000,
        ]);
    }
}
