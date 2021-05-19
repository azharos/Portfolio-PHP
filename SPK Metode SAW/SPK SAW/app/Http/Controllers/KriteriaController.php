<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Kriteria::jenis();
        $benefit = Kriteria::benefit();
        $cost = Kriteria::cost();
        $hasil = Kriteria::hasil();
        // $hasil = 1;

        // return $hasil;

        return view('kriteria.index', compact('jenis', 'benefit', 'cost', 'hasil'));
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
        $messages = [
            'nama.required' => "Nama wajib diisi",
            'bobot.required' => "Bobot wajib diisi",
            'bobot.numeric' => "Bobot Berupa Angka",
        ];

        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric'
        ], $messages);

        $ktr = new Kriteria;

        $ktr->nama = $request->nama;
        $ktr->bobot = $request->bobot;
        $ktr->jenis_kriteria = $request->jns_kriteria;

        $ktr->save();

        return redirect('/kriteria')->with('sukses', 'Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ktr = Kriteria::find($id);

        $ktr->nama = $request->nama;
        $ktr->bobot = $request->bobot;
        $ktr->jenis_kriteria = $request->jns_kriteria;

        $ktr->save();

        return redirect('/kriteria')->with('sukses', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ktr = Kriteria::find($id);
        $ktr->delete();

        return redirect('/kriteria')->with('sukses', 'Berhasil Dihapus');
    }
}
