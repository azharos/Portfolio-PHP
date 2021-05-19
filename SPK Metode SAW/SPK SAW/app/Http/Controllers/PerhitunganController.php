<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Kriteria;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('perhitungan/index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kdt = Kandidat::find($id);
        $kriteria = Kriteria::all();
        $cek_kdt = Perhitungan::cek_kandidat($id);

        return view('perhitungan.tambah', compact('kdt', 'kriteria', 'cek_kdt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $jmlh = count($request->id_kandidat);

        for ($i = 0; $i < $jmlh; $i++) {
            $pht = new Perhitungan;
            $pht->id_kandidat = $request->id_kandidat[$i];
            $pht->id_kriteria = $request->id_kriteria[$i];
            $pht->nilai = $request->nilai[$i];

            $pht->save();
        }

        return redirect('/perhitungan/' . $id . '');
    }

    public function store2(Request $request, $id)
    {
        $kriteria = Perhitungan::cek_kriteria($id);

        // Ubah Status Kriteria
        $ktr = Kriteria::find($id);
        $ktr->status = 'sudah';
        $ktr->save();

        if ($request->jenis_ktr == "benefit") {

            // Menghitung Nilai Max
            $max = Perhitungan::max($id);

            // Menghitung hasil dari tiap kriteria
            foreach ($kriteria as $ktr) {
                $pht = Perhitungan::where('id_kandidat', $ktr->id_kandidat)
                    ->where('id_kriteria', $id)
                    ->first();

                $nilai = $pht->nilai / $max;
                $nilai = round($nilai, 3);

                $pht->hasil = $nilai;
                $pht->save();
            }

            return redirect('/hasil')->with('sukses', 'Berhasil di Generate');
        } elseif ($request->jenis_ktr == "cost") {

            // Menghitung Nilai Min
            $min = Perhitungan::min($id);

            // Menghitung hasil dari tiap kriteria
            foreach ($kriteria as $ktr) {
                $pht = Perhitungan::where('id_kandidat', $ktr->id_kandidat)
                    ->where('id_kriteria', $id)
                    ->first();

                $nilai = $min / $pht->nilai;
                $nilai = round($nilai, 3);

                $pht->hasil = $nilai;
                $pht->save();
            }

            return redirect('/hasil')->with('sukses', 'Berhasil di Generate');
        }
    }

    public function store3(Request $request, $id)
    {
        $kriteria = Kriteria::all();
        $kandidat = Kandidat::where('id', $id)->first();
        $perhitungan = Perhitungan::where('id_kandidat', $id)->get();

        $nilai1 = [];
        foreach ($kriteria as $ktr) {
            $nilai1[] = $ktr->bobot;
        }

        $nilai2 = [];
        foreach ($perhitungan as $pht) {
            $nilai2[] = $pht->hasil;
        }

        $hasil_smt = [];
        for ($i = 0; $i < count($nilai2); $i++) {
            $hasil_smt[] = round($nilai1[$i] * $nilai2[$i], 3);
        }

        $hasil_asli = 0;
        for ($i = 0; $i < count($hasil_smt); $i++) {
            $hasil_asli += $hasil_smt[$i];
        }

        $kandidat->hasil = $hasil_asli;
        $kandidat->status = 'sudah';
        $kandidat->save();

        return redirect('/hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cek_kdt = Perhitungan::cek_kandidat($id);
        $jmlh = count($request->id_kdt);

        for ($i = 0; $i < $jmlh; $i++) {
            $cek_kdt[$i]->nilai = $request->nilai[$i];

            $cek_kdt[$i]->save();
        }

        return redirect('/perhitungan/' . $id . '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }

    public function hasil_kriteria()
    {
        $benefit = Kriteria::benefit();
        $cost = Kriteria::cost();

        $status = Kriteria::status();
        $kriteria = Kriteria::all()->count();

        return view('perhitungan.hasil_kriteria', compact('benefit', 'cost', 'status', 'kriteria'));
    }

    public function hasil_kandidat()
    {
        $kandidat = Kandidat::orderBy('hasil', 'desc')->get();

        return view('perhitungan.hasil_kandidat', compact('kandidat'));
    }
}
