<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (session('nama')) {
            return redirect('/app/dashboard');
        }

        return view('auth/login');
    }

    public function login(Request $request)
    {
        $message = [
            'nama.required' => "Nama Wajib Diisi",
            'password.required' => "Password Wajib Diisi",
        ];

        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ], $message);

        $user = Pegawai::where('nama_pegawai', $request->nama)->first();

        if (!$user) {
            return redirect('/')->with('gagal', 'Username Salah');
        } else {
            if (!Hash::check($request->password, $user->password)) {
                return redirect('/')->with('gagal', 'Password Salah');
            }
        }

        // Session
        $request->session()->put('level', $user->level);
        $request->session()->put('nama', $request->nama);
        $request->session()->put('id', $user->id);
        $request->session()->put('photo', $user->photo);

        return redirect('/app/dashboard')->with('status', 'Selamat Datang ' . session('nama') . ' di APP Pengajian CV KANG KONTER');
    }

    public function dashboard()
    {
        $pegawai = Pegawai::find(session('id'));

        // Count
        $pgw = Pegawai::all();
        $abs = Absensi::all();
        $jbt = Jabatan::all();

        if (session('level') == 'admin') {
            return view('dashboard', compact('pgw', 'abs', 'jbt'));
        } else {
            return view('user/dashboard', compact('pegawai'));
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('level');
        $request->session()->forget('nama');
        $request->session()->forget('id');

        return redirect('/');
    }

    public function password()
    {
        if (session('level') == 'admin') {
            return view('auth/password');
        } else {
            return view('user/password');
        }
    }

    public function ubahPassword(Request $request)
    {
        $messages = [
            'required' => 'Wajib diisi.',
            'same'    => 'Password harus sama',
        ];

        $request->validate([
            'pwd1' => 'required|same:pwd2',
            'pwd2' => 'required|same:pwd1',
        ], $messages);

        $pegawai = Pegawai::find($request->id);

        $pegawai->password = Hash::make($request->pwd1);

        $pegawai->save();

        $request->session()->forget('level');
        $request->session()->forget('nama');
        $request->session()->forget('id');

        return redirect('/')->with('sukses', 'Password Berhasil Diubah !!! Silahkan Login Kembali');
    }
}
