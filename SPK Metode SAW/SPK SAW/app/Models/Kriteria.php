<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'tb_kriteria';
    protected $primaryKey = 'id';

    public static function jenis()
    {
        $jenis = ['benefit', 'cost'];
        return $jenis;
    }

    public static function benefit()
    {
        $benefit = Kriteria::where('jenis_kriteria', 'benefit')->get();
        return $benefit;
    }

    public static function cost()
    {
        $kriteria = Kriteria::where('jenis_kriteria', 'cost')->get();
        return $kriteria;
    }

    public static function hasil()
    {
        $ktr = Kriteria::all();

        $hasil = 0;
        for ($i = 0; $i < $ktr->count(); $i++) {
            $hasil += $ktr[$i]->bobot;
        }

        return $hasil;
    }

    public static function status()
    {
        $status = Kriteria::where('status', 'sudah')->get();
        return $status;
    }
}
