<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganGaji extends Model
{
    use HasFactory;

    protected $table = 'tb_potongan_gaji';
    protected $primaryKey = 'id';

    public static function jenis_potongan()
    {
        $jns = ['izin', 'sakit', 'alpha'];
        return $jns;
    }
}
