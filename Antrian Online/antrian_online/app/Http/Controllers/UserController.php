<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Users;
// use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        if ($request->session()->has('jambuka')) {
            return view('user/index');
        } else {
            $request->session()->put('jambuka', 8);
            $request->session()->put('jamTutup', 17);
        }

        return view('user/index');
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
        $tbl = DB::table('loket_antrian')
            ->where('tanggal', $request->tanggal)
            ->where('id_user', $request->id_user)
            ->where('nama_loket', $request->nama_loket)
            ->count();

        if ($tbl > 0) {
            echo "<script>
                alert('Antrian Sudah Terdaftar Hari Ini');
                document.location.href = '/loket';
            </script>";
        } else {
            DB::table('loket_antrian')->insert([
                'id_user' => $request->id_user,
                'nomor' => $request->nomer,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'status' => 'belum',
                'nama_loket' => $request->nama_loket,
            ]);

            return redirect('loket');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        $level = $request->session()->get('level');
        $nama = $request->session()->get('nama');
        $id = $request->session()->get('id');

        $user = DB::table('user')->find($id);

        return view('user/profile', ['level' => $level, 'nama' => $nama, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request)
    {
        DB::table('user')
            ->where('id', $request->session()->get('id'))
            ->update([
                'username' => $request->username,
                'noktp' => $request->noktp,
                'alamat' => $request->alamat,
                'no_telp' => $request->nohp
            ]);
        return redirect('app')->with('sukses', 'Profile Updated!');
    }

    public function update2(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'same'    => 'Password harus sama',
        ];

        $request->validate([
            'password' => 'required|same:password2',
            'password2' => 'required|same:password'
        ], $messages);

        DB::table('user')
            ->where('id', $request->session()->get('id'))
            ->update([
                'password' => Hash::make($request->password)
            ]);
        return redirect('app')->with('sukses-password', 'Password Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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

    public function loket(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H');
        $tgl_sekarang = date('d-m-Y');

        // Setting Jam
        $jamBuka = ['7', '8', '9'];
        $jamTutup = ['15', '16', '17', '18'];

        // Loket
        $all_loket = DB::table('loket')->get();

        // Nomor Antrian User
        $user_ant = DB::table('loket_antrian')
            ->where('tanggal', date('d-m-Y'))
            ->where('id_user', $request->session()->get('id'))
            ->get();


        return view('user/loket', compact('jam', 'jamBuka', 'jamTutup', 'all_loket', 'user_ant'));
    }

    public function next_antrian(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        $request->session()->put('nama_loket', $request->nama_loket);

        DB::table('loket_antrian')
            ->where('nomor', $request->nomor)
            ->where('tanggal', $request->tanggal)
            ->where('nama_loket', $request->nama_loket)
            ->update(['status' => 'sudah']);

        return redirect('loket/loket_antrian')->with('sukses', 'Lanjut Nomor Antrian Berikutnya...');
        // return redirect('loket');
    }

    public function antrian(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        if ($request->session()->get('level') == 'admin') {

            if ($request->isMethod('get')) {
                $users = DB::table('loket_antrian')
                    ->join('user', 'loket_antrian.id_user', '=', 'user.id')
                    ->select('*')
                    ->where('loket_antrian.tanggal', '=', date('d-m-Y'))
                    ->where('loket_antrian.nama_loket', '=', $request->session()->get('nama_loket'))
                    ->get();

                return view('user/antrian', compact('users'));
                // return view('user/antrian');
            } elseif ($request->isMethod('post')) {
                // SELECT * FROM loket_antrian JOIN user ON loket_antrian.id_user = user.id 
                $users = DB::table('loket_antrian')
                    ->join('user', 'loket_antrian.id_user', '=', 'user.id')
                    ->select('*')
                    ->where('loket_antrian.tanggal', '=', date('d-m-Y'))
                    ->where('loket_antrian.nama_loket', '=', $request->nama_loket)
                    ->get();

                return view('user/antrian', compact('users'));
            }
        } else {
            return view('404');
        }
    }

    public function laporan(Request $request)
    {
        if (!$request->session()->has('level')) {
            return redirect('/');
        }

        if ($request->session()->get('level') == 'admin') {
            $laporan = DB::table('loket_antrian')
                ->select('tanggal', DB::raw('count(*) as jumlah'))
                ->groupBy('tanggal')
                ->orderBy('id', 'desc')
                ->paginate(5);

            return view('user/laporan', compact('laporan', 'tgl_sekarang'));
        } else {
            return view('404');
        }
    }

    public function waktu(Request $request)
    {
        $request->session()->put('jambuka', $request->jamBuka);
        $request->session()->put('jamTutup', $request->jamTutup);

        echo "
            <script>
                alert('Jam Berhasil Diubah');
                document.location.href = '/loket';
            </script>
        ";
    }

    public function add_loket(Request $request)
    {
        DB::table('loket')->insert(
            ['nama_loket' => $request->nama_loket]
        );

        echo "
            <script>
                alert('Loket Berhasil Ditambah');
                document.location.href = '/loket';
            </script>
        ";
    }

    public function delete1(Request $request)
    {
        DB::table('loket')
            ->where('nama_loket', $request->nama_loket)
            ->delete();

        return redirect('loket');
    }

    public function pdfAntrianUser(Request $request)
    {
        // SELECT * FROM `loket_antrian` JOIN `user` ON `loket_antrian`.`id_user` = `user`.`id` WHERE `loket_antrian`.`tanggal` = '07-04-2021' AND `loket_antrian`.`id_user` = 4 AND `loket_antrian`.`nama_loket` = 'Pembayaran SPP'

        $user = DB::table('loket_antrian')
            ->join('user', 'loket_antrian.id_user', '=', 'user.id')
            ->where('loket_antrian.tanggal', $request->tanggal)
            ->where('loket_antrian.id_user', $request->id_user)
            ->where('loket_antrian.nama_loket', $request->nama_loket)
            ->select('*')
            ->get();

        $data['user'] = $user;
        $pdf = \PDF::loadView('pdf/pdfAntrianUser', $data);
        $pdf->setPaper('a4');
        return $pdf->stream('antrian.pdf');
    }

    public function pdfLaporan(Request $request)
    {
        // SELECT nama_loket FROM `loket_antrian` WHERE `loket_antrian`.`tanggal` = '07-04-2021' GROUP BY `loket_antrian`.`nama_loket`

        $nama_loket = DB::table('loket_antrian')
            ->where('tanggal', $request->tanggal)
            ->groupBy('nama_loket')
            ->select('nama_loket')
            ->get();

        // $tanggal = $request->tanggal;

        // return view('pdf/pdfLaporan', compact('nama_loket', 'tanggal'));
        $data['nama_loket'] = $nama_loket;
        $data['tanggal'] = $request->tanggal;

        $pdf = \PDF::loadView('pdf/pdfLaporan', $data);
        $pdf->setPaper('a4');
        return $pdf->stream('Laporan' . $request->tanggal . '.pdf');
    }
}
