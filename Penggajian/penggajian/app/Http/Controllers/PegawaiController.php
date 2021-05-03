<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\PotonganGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $level = Pegawai::level();
        return view('pegawai.tambah', compact('jabatan', 'level'));
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
            'nik.required' => 'NIK Wajib Diisi',
            'pwd.required' => 'Password Wajib Diisi',
            'np.required' => 'Nama Pegawai Wajib Diisi',
            'photo.required' => 'Photo Wajib Diisi',
            'photo.image' => 'File Harus Berupa Gambar',
            'photo.max' => 'Ukuran File Maksimal 200 KB',
        ];

        $request->validate([
            'nik' => 'required|integer',
            'np' => 'required',
            'pwd' => 'required',
            'photo' => 'required|image|max:2000',
        ], $message);

        $file = $request->file('photo');
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $New_nama_file = $filename . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('./photo/', $New_nama_file);

        $pegawai = new Pegawai;

        $pegawai->nik = $request->nik;
        $pegawai->nama_pegawai = $request->np;
        $pegawai->password = Hash::make($request->np);
        $pegawai->jenis_kelamin = $request->jk;
        $pegawai->jabatan = $request->jbt;
        $pegawai->tanggal_masuk = $request->tgl;
        $pegawai->status = $request->sts;
        $pegawai->level = $request->lvl;
        $pegawai->photo = $New_nama_file;

        $pegawai->save();

        return redirect('admin/pegawai')->with('sukses', 'Data Pegawai Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pgw = Pegawai::find($id);
        $jabatan = Jabatan::all();
        $kelamin = Pegawai::jenis_kelamin();
        $status = Pegawai::status();
        return view('pegawai/edit', compact('pgw', 'kelamin', 'status', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pgw = Pegawai::find($id);

        $message = [
            'nik.required' => 'NIK Wajib Diisi',
            'np.required' => 'Nama Pegawai Wajib Diisi',
            'jbt.required' => 'Jabatan Wajib Diisi',
            'photo.image' => 'File Harus Berupa Gambar',
            'photo.max' => 'Ukuran File Maksimal 200 KB',
        ];

        $request->validate([
            'nik' => 'required|integer',
            'np' => 'required',
            'jbt' => 'required',
            'photo' => 'image|max:2000',
        ], $message);

        if ($request->file('photo')) {

            unlink('./photo/' . $pgw->photo);

            $file = $request->file('photo');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $New_nama_file = $filename . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('./photo/', $New_nama_file);
        } else {
            $New_nama_file = $pgw->photo;
        }

        // Update Kehadiran
        $abs = Absensi::where('nama_karyawan', $pgw->nama_pegawai)->get();
        for ($i = 0; $i < $abs->count(); $i++) {
            $abs[$i]->nik = $request->nik;
            $abs[$i]->nama_karyawan = $request->np;

            $abs[$i]->save();
        }

        // Update Pegawai
        $pgw->nik = $request->nik;
        $pgw->nama_pegawai = $request->np;
        $pgw->jenis_kelamin = $request->jk;
        $pgw->jabatan = $request->jbt;
        $pgw->tanggal_masuk = $request->tgl;
        $pgw->status = $request->sts;
        $pgw->photo = $New_nama_file;

        $pgw->save();

        return redirect('/admin/pegawai')->with('sukses', 'Data Pegawai Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('admin/pegawai')->with('sukses', 'Data Pegawai Dihapus');
    }

    public function dataGaji(Request $request)
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

        // tb_kehadiran JOIN tb_jabatan
        $gaji = Absensi::gaji($blnthn);

        // Potongan Gaji
        $potongan = PotonganGaji::all();
        $izin = $potongan[0]['jumlah_potongan'];
        $sakit = $potongan[1]['jumlah_potongan'];
        $alpha = $potongan[2]['jumlah_potongan'];

        // return $gaji;

        return view('pegawai.dataGaji', compact('tahun1', 'bulan', 'tahun2', 'gaji', 'izin', 'sakit', 'alpha'));
    }

    public function cetakGaji(Request $request)
    {
        if ($request->tahun == null && $request->bulan == null) {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        } else {

            if ($request->bulan == null) {
                $bulan = date('m');
            } else {
                $bulan = $request->bulan;
            }

            if ($request->tahun == null) {
                $tahun = date('Y');
            } else {
                $tahun = $request->tahun;
            }

            $blnthn = $bulan . $tahun;
        }
        // $bulan = $request->bulan;
        // $tahun = $request->tahun;
        // $blnthn = $request->bulan . $request->tahun;

        // tb_kehadiran JOIN tb_jabatan
        $cetakgaji = Absensi::gaji($blnthn);

        // Potongan Gaji
        $potongan = PotonganGaji::all();
        $izin = $potongan[0]['jumlah_potongan'];
        $sakit = $potongan[1]['jumlah_potongan'];
        $alpha = $potongan[2]['jumlah_potongan'];

        return view('pegawai.cetakGaji', compact('cetakgaji', 'izin', 'sakit', 'alpha', 'bulan', 'tahun'));

        // $pdf = \PDF::loadview('pegawai.cetakGaji', compact('cetakgaji', 'izin', 'sakit', 'alpha', 'bulan', 'tahun'));
        // $pdf->setPaper('a4', 'landscape');
        // return $pdf->download('gajipegawai.pdf');
    }

    public function laporanGaji()
    {
        $tahun = Absensi::tahun();
        return view('pegawai.laporanGaji', compact('tahun'));
    }

    public function slipGaji()
    {
        $tahun = Absensi::tahun();
        $pegawai = Pegawai::where('level', 'user')->get();
        return view('pegawai.slipgaji', compact('tahun', 'pegawai'));
    }

    public function cetakSlipGaji(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $nama = $request->nama;
        $blnthn = $request->bulan . $request->tahun;

        // Slip Gaji
        $slipGaji = Absensi::cetakslipuser($nama, $blnthn, 'get');

        // Potongan Gaji
        $potongan = PotonganGaji::all();
        $izin = $potongan[0]['jumlah_potongan'];
        $sakit = $potongan[1]['jumlah_potongan'];
        $alpha = $potongan[2]['jumlah_potongan'];

        if ($slipGaji->count() == 0) {
            return "<script>
                alert('Data Tidak Ada');
                document.location.href = '/admin/slip-gaji';
            </script>";
        } else {
            $slipGaji = $slipGaji[0];
            return view('pegawai.cetakSlipGaji', compact('bulan', 'tahun', 'slipGaji', 'izin', 'sakit', 'alpha'));
        }
    }
}
