<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_kandidat = Kandidat::all();
        return view('kandidat.index', compact('all_kandidat'));
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
        $kdt = new Kandidat;

        $kdt->nama = $request->nama;
        $kdt->pekerjaan = $request->job;
        $kdt->alamat = $request->alamat;

        $kdt->save();

        return redirect('/kandidat')->with('sukses', 'Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(Kandidat $kandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kdt = Kandidat::find($id);

        return view('kandidat.edit', compact('kdt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kdt = Kandidat::find($id);

        $kdt->nama = $request->nama;
        $kdt->pekerjaan = $request->job;
        $kdt->alamat = $request->alamat;

        $kdt->save();

        return redirect('/kandidat')->with('sukses', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kdt = Kandidat::find($id);

        $kdt->delete();

        return redirect('/kandidat')->with('sukses', 'Berhasil Dihapus');
    }
}
