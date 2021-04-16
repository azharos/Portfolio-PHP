<?php

namespace App\Http\Controllers;

use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('level')) {
            return redirect('app');
        }

        $tbl = DB::table('loket_antrian')
            ->where('tanggal', date('d-m-Y'))
            ->count();

        if ($tbl == 0) {
            $nomer = 1;
        } else {
            $tbl_antrian = DB::table('loket_antrian')
                ->orderBy('id', 'desc')
                ->where('tanggal', date('d-m-Y'))
                ->limit(1)
                ->get();

            foreach ($tbl_antrian as $ant) {
                $nomer = $ant->nomor + 1;
            }
        }

        $loket = DB::table('loket')->get();

        return view('auth/index', compact('loket'));
    }

    public function login(Request $request)
    {
        if ($request->session()->has('level')) {
            return redirect('app');
        }
        return view('auth/login');
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
    public function store1(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'numeric' => ':attribute berisi nomor',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maximal :max karakter',
        ];

        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|max:15',
            'noktp' => 'required|min:1|numeric',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'notelp' => 'required'
        ], $messages);

        $users = DB::table('user')->where('username', $request->username)->get();

        if ($users->count() > 0) {
            echo "<script>
                alert('username sudah ada');
                document.location.href = '/';
            </script>";
        } else {
            DB::table('user')->insert([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'noktp' => $request->noktp,
                'jenis_kelamin' => $request->jeniskelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->notelp,
                'level' => 'user'
            ]);

            return redirect('login')->with('sukses', 'Registrasi Berhasil !!!');
        }
    }

    public function store2(Request $request)
    {
        $users = DB::table('user')->where('username', $request->username)->get();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('level', $user->level); // Session Multi Level
                    $request->session()->put('nama', $user->username); // Session Username
                    $request->session()->put('id', $user->id); // Session id
                    return redirect('app');
                } else {
                    return redirect('login')->with('gagal', 'Password Salah !!!');
                }
            }
        } else {
            return redirect('login')->with('gagal', 'Username Salah !!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }

    public function delete(Request $request)
    {
        $request->session()->forget('level');
        $request->session()->forget('nama');
        $request->session()->forget('id');
        return redirect('login')->with('sukses', 'Berhasil Logout !!!');
    }
}
