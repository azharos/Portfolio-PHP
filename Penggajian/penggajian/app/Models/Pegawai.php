<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id';

    public static function jenis_kelamin()
    {
        $jns_klm = ['Laki-Laki', 'Perempuan'];
        return $jns_klm;
    }

    public static function status()
    {
        $status = ['Pegawai Kontrak', 'Pegawai Tetap'];
        return $status;
    }

    public static function level()
    {
        $level = ['user', 'admin'];
        return $level;
    }
}
