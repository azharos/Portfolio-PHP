<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\PotonganGaji;

class UserController extends Controller
{
    public function dataGaji()
    {
        $nama = session('nama');

        // Slip Gaji
        $slipuser = Absensi::slipgajiuser($nama);

        // Potongan Gaji
        $potongan = PotonganGaji::all();
        $izin = $potongan[0]['jumlah_potongan'];
        $sakit = $potongan[1]['jumlah_potongan'];
        $alpha = $potongan[2]['jumlah_potongan'];

        return view('user/datagaji', compact('slipuser', 'izin', 'sakit', 'alpha'));
    }

    public function cetakGaji(Request $request, $id)
    {
        $nama = session('nama');
        $blnthn = $request->blnthn;

        // Cetak Gaji
        $cetakslip = Absensi::cetakslipuser($nama, $blnthn, 'first');

        // Potongan Gaji
        $potongan = PotonganGaji::all();
        $izin = $potongan[0]['jumlah_potongan'];
        $sakit = $potongan[1]['jumlah_potongan'];
        $alpha = $potongan[2]['jumlah_potongan'];

        // return view('user.cetakGaji', compact('cetakslip', 'izin', 'sakit', 'alpha', 'blnthn'));

        $pdf = \PDF::loadview('user.cetakGaji', compact('cetakslip', 'izin', 'sakit', 'alpha', 'blnthn'));
        $pdf->setPaper('a4');
        return $pdf->download('laporan-gaji-' . $blnthn . '.pdf');
    }
}
