<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'tb_kehadiran';
    protected $primaryKey = 'id';

    public static function tahun()
    {
        $thn = date('Y');
        $tahun = [];

        for ($i = 2021; $i < $thn + 5; $i++) {
            $tahun[] = $i;
        }

        return $tahun;
    }

    public static function tb_absensi($blnthn)
    {
        $absensi = Absensi::join('tb_pegawai', 'tb_kehadiran.nik', '=', 'tb_pegawai.nik')
            ->select('*')
            ->where('tb_kehadiran.bulan', $blnthn)
            ->get();

        return $absensi;
    }

    public static function tb_inputAbsensi($blnthn)
    {
        $inputAbsen = Pegawai::whereNotExists(function ($query) use ($blnthn) {
            $query->select('*')
                ->from('tb_kehadiran')
                ->whereColumn('tb_pegawai.nik', 'tb_kehadiran.nik')
                ->where('tb_kehadiran.bulan', $blnthn);
        })->get();

        return $inputAbsen;
    }

    public static function gaji($blnthn)
    {
        $gaji = Absensi::join('tb_jabatan', 'tb_jabatan.nama_jabatan', '=', 'tb_kehadiran.nama_jabatan')
            ->select('*')
            ->where('tb_kehadiran.bulan', $blnthn)
            ->get();

        return $gaji;
    }

    public static function slipgajiuser($nama)
    {
        $slipuser = Absensi::join('tb_jabatan', 'tb_kehadiran.nama_jabatan', '=', 'tb_jabatan.nama_jabatan')
            ->where('tb_kehadiran.nama_karyawan', $nama)
            ->get();

        return $slipuser;
    }

    public static function cetakslipuser($nama, $blnthn, $aksi)
    {
        $slipGaji = Absensi::join('tb_jabatan', 'tb_jabatan.nama_jabatan', '=', 'tb_kehadiran.nama_jabatan')
            ->where('tb_kehadiran.bulan', $blnthn)
            ->where('tb_kehadiran.nama_karyawan', $nama)
            ->$aksi();

        return $slipGaji;
    }
}
