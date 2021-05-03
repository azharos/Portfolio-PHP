<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun1 = Absensi::tahun();

        // Cek Bulan dan Tahun (GET)
        if ($request->tahun == null && $request->bulan == null) {
            $bulan = date('m');
            $tahun2 = date('Y');
            $blnthn = $bulan . $tahun2;
        } else {

            if ($request->bulan == null) {
                $bulan = date('m');
            } else {
                $bulan = $request->bulan;
            }

            if ($request->tahun == null) {
                $tahun2 = date('Y');
            } else {
                $tahun2 = $request->tahun;
            }

            $blnthn = $bulan . $tahun2;
        }

        // tb_absensi
        $absensi = Absensi::tb_absensi($blnthn);

        return view('absensi.index', compact('tahun1', 'tahun2', 'bulan', 'absensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jmlh = count($request->blnthn);
        for ($i = 0; $i < $jmlh; $i++) {
            $absensi = new Absensi;

            $absensi->bulan = $request->blnthn[$i];
            $absensi->nik = $request->nik[$i];
            $absensi->nama_karyawan = $request->nama[$i];
            $absensi->jenis_kelamin = $request->jk[$i];
            $absensi->nama_jabatan = $request->jbt[$i];
            $absensi->hadir = $request->hadir[$i];
            $absensi->izin = $request->izin[$i];
            $absensi->sakit = $request->sakit[$i];
            $absensi->apha = $request->alpha[$i];

            $absensi->save();
        }

        DB::table('tb_kehadiran')
            ->where('nama_karyawan', 'admin')
            ->where('bulan', $request->blnthn)
            ->delete();

        return redirect('/admin/absensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }

    public function inputAbsensi(Request $request)
    {
        $tahun1 = Absensi::tahun();

        // Cek Bulan dan Tahun (GET)
        if ($request->tahun == null && $request->bulan == null) {
            $bulan = date('m');
            $tahun2 = date('Y');
            $blnthn = $bulan . $tahun2;
        } else {
            if ($request->bulan == null) {
                $bulan = date('m');
            } else {
                $bulan = $request->bulan;
            }

            if ($request->tahun == null) {
                $tahun2 = date('Y');
            } else {
                $tahun2 = $request->tahun;
            }
            $blnthn = $bulan . $tahun2;
        }

        $tb_inputAbsensi = Absensi::tb_inputAbsensi($blnthn);

        return view('absensi/inputAbsensi', compact('tahun1', 'bulan', 'tahun2', 'blnthn', 'tb_inputAbsensi'));
    }

    public function laporanAbsensi()
    {
        $tahun = Absensi::tahun();
        return view('absensi/laporanAbsensi', compact('tahun'));
    }

    public function cetakAbsensi(Request $request)
    {
        $bln = $request->bulan;
        $thn = $request->tahun;
        $blnthn = $request->bulan . $request->tahun;

        $absensi = Absensi::where('bulan', $blnthn)->get();

        if ($absensi->count() == 0) {
            return "<script>
                alert('Data Tidak Ada');
                document.location.href = '/admin/laporan-absensi';
            </script>
            ";
        } else {
            $pdf = \PDF::loadview('absensi/cetakAbsensi', compact('absensi', 'bln', 'thn'));
            $pdf->setPaper('a4');
            return $pdf->download('absensi_' . $blnthn . '.pdf');
            // return view('absensi/cetakAbsensi', compact('absensi', 'bln', 'thn'));
        }
    }
}
