<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    protected $table = 'tb_perhitungan';
    protected $primaryKey = 'id';

    public static function cek_kandidat($id)
    {
        $kdt = Perhitungan::where('id_kandidat', $id)->get();
        return $kdt;
    }

    public static function cek_kriteria($id)
    {
        $ktr = Perhitungan::where('id_kriteria', $id)->get();
        return $ktr;
    }

    public static function max($id)
    {
        return Perhitungan::where('id_kriteria', $id)->max('nilai');
    }

    public static function min($id)
    {
        return Perhitungan::where('id_kriteria', $id)->min('nilai');
    }
}
