<?php

namespace App\Http\Controllers;

use App\Models\PotonganGaji;
use Illuminate\Http\Request;

class PotonganGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potongangaji = PotonganGaji::all();
        return view('potongan.index', compact('potongangaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jns_potongan = PotonganGaji::jenis_potongan();
        return view('potongan.tambah', compact('jns_potongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'jmlh_potongan.required' => 'Wajib Diisi',
            'jmlh_potongan.integer' => 'Jumlah Potongan Berupa Angka',
        ];

        $validated = $request->validate([
            'jmlh_potongan' => 'required|integer'
        ], $message);

        $potongangaji = new PotonganGaji;

        $potongangaji->jenis_potongan = $request->jns_potongan;
        $potongangaji->jumlah_potongan = $request->jmlh_potongan;

        $potongangaji->save();

        return redirect('/admin/potongan-gaji')->with('sukses', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotonganGaji  $potonganGaji
     * @return \Illuminate\Http\Response
     */
    public function show(PotonganGaji $potonganGaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotonganGaji  $potonganGaji
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tb_potonganGaji = PotonganGaji::find($id);
        $jns_potongan = PotonganGaji::jenis_potongan();

        return view('potongan.edit', compact('jns_potongan', 'tb_potonganGaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PotonganGaji  $potonganGaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $potongan = PotonganGaji::find($id);

        $potongan->jenis_potongan = $request->jns_potongan;
        $potongan->jumlah_potongan = $request->jmlh_potongan;

        $potongan->save();

        return redirect('/admin/potongan-gaji')->with('sukses', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PotonganGaji  $potonganGaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $potongan = PotonganGaji::find($id);
        $potongan->delete();

        return redirect('/admin/potongan-gaji')->with('sukses', 'Data Berhasil Dihapus');
    }
}
