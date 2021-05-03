<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Absensi;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alljabatan = Jabatan::all();
        return view('jabatan/index', compact('alljabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan/create');
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
            'nama.required'          => 'Nama wajib diisi.',
            'gp.required'          => 'Gaji Pokok wajib diisi.',
            'tj.required'          => 'Tunjangan wajib diisi.',
            'um.required'          => 'Uang Makan wajib diisi.',
            'gp.integer'          => 'Gaji Pokok berupa angka.',
            'tj.integer'          => 'Tunjangan berupa angka.',
            'um.integer'          => 'Uang Makan berupa angka.',
        ];

        $request->validate([
            'nama' => 'required',
            'gp' => 'required|integer',
            'tj' => 'required|integer',
            'um' => 'required|integer',
        ], $messages);

        $jabatan = new Jabatan;

        $jabatan->nama_jabatan = $request->nama;
        $jabatan->gaji_pokok = $request->gp;
        $jabatan->tunjangan = $request->tj;
        $jabatan->uang_makan = $request->um;

        $jabatan->save();

        return redirect('/admin/jabatan')->with('sukses', 'Data Jabatan Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jbt = Jabatan::find($id);
        return view('jabatan/edit', compact('jbt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $jabatan = Jabatan::find($request->id);

        $messages = [
            'nama.required'          => 'Nama wajib diisi.',
            'gp.required'          => 'Gaji Pokok wajib diisi.',
            'tj.required'          => 'Tunjangan wajib diisi.',
            'um.required'          => 'Uang Makan wajib diisi.',
            'gp.integer'          => 'Gaji Pokok berupa angka.',
            'tj.integer'          => 'Tunjangan berupa angka.',
            'um.integer'          => 'Uang Makan berupa angka.',
        ];

        $request->validate([
            'nama' => 'required',
            'gp' => 'required|integer',
            'tj' => 'required|integer',
            'um' => 'required|integer',
        ], $messages);

        // Update Absensi (Kehadiran)
        $abs = Absensi::where('nama_jabatan', $jabatan->nama_jabatan)->get();
        for ($i = 0; $i < $abs->count(); $i++) {
            $abs[$i]->nama_jabatan = $request->nama;
            $abs[$i]->save();
        }

        // Update Pegawai
        $pgw = Pegawai::where('jabatan', $jabatan->nama_jabatan)->get();
        for ($i = 0; $i < $pgw->count(); $i++) {
            $pgw[$i]->jabatan = $request->nama;
            $pgw[$i]->save();
        }

        // Update Jabatan
        $jabatan->nama_jabatan = $request->nama;
        $jabatan->gaji_pokok = $request->gp;
        $jabatan->tunjangan = $request->tj;
        $jabatan->uang_makan = $request->um;
        $jabatan->save();

        return redirect('/admin/jabatan')->with('sukses', 'Data Jabatan Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect('/admin/jabatan')->with('sukses', 'Data Jabatan Dihapus');
    }
}
