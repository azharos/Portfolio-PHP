<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Slip Gaji</title>
    <style>
        body{
            font-family: arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>CV. KANG KONTER</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%;height:3px;background-color:grey;border:none;">
    </center>

    <table style="margin-top: 2em;margin-bottom: 2em">
        <tr>
            <td width='200px'>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $slipGaji->nama_karyawan }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $slipGaji->nama_jabatan }}</td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{ $bulan }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ $tahun }}</td>
        </tr>
    </table>

    @php
        $potongan = $slipGaji->izin * $izin + $slipGaji->sakit * $sakit + $slipGaji->apha * $alpha;
    @endphp

    <table width='100%' cellpadding=10; cellspacing=0 border=1>
        <tr>
            <th style="text-align: center" width=5%>No</th>
            <th style="text-align: center">Keterangan</th>
            <th style="text-align: center">Jumlah</th>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td>Gaji Pokok</td>
            <td>Rp. {{ number_format($slipGaji->gaji_pokok,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Tunjangan</td>
            <td>Rp. {{ number_format($slipGaji->tunjangan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Uang Makan</td>
            <td>Rp. {{ number_format($slipGaji->uang_makan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Potongan</td>
            <td>Rp. {{ number_format($potongan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">Total Gaji</td>
            <td>Rp. {{ number_format($slipGaji->gaji_pokok + $slipGaji->tunjangan + $slipGaji->uang_makan - $potongan,0,'.','.') }}</td>
        </tr>
    </table>

    <table width=100%>
        <tr>
            <td></td>
            <td>
                <p>Pegawai</p>
                <br><br><br>
                <p>{{ $slipGaji->nama_karyawan }}</p>
            </td>
            <td width=200px>
                <p>Semarang, {{ date('d M Y') }}
                    <br>Finance
                </p>
                <br><br><br>
                <p>.........................................</p>
            </td>
        </tr>
    </table>
</body>
</html>