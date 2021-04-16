<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }
        $level = $request->session()->get('level');
        $nama = $request->session()->get('nama');
        $id = $request->session()->get('id');

        $user = DB::table('user')->find($id);

        return view('app/index', ['level' => $level, 'nama' => $nama, 'user' => $user]);
    }

    public function delete(Request $request)
    {
        $request->session()->forget('level');
        return redirect('login')->with('sukses', 'Berhasil Logout !!!');
    }
}
