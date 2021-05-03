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
        <hr style="height:3px;background-color:black;border:none;">
    </center>

    <table style="margin-top: 2em;margin-bottom: 2em">
        <tr>
            <td width='200px'>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $cetakslip->nama_karyawan }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $cetakslip->nama_jabatan }}</td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{ Str::substr($blnthn, 0, 2) }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ Str::substr($blnthn, 2, 4) }}<td>
        </tr>
    </table>

    @php
        $potongan = $cetakslip->izin * $izin + $cetakslip->sakit * $sakit + $cetakslip->apha * $alpha;
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
            <td>Rp. {{ number_format($cetakslip->gaji_pokok,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Tunjangan</td>
            <td>Rp. {{ number_format($cetakslip->tunjangan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Uang Makan</td>
            <td>Rp. {{ number_format($cetakslip->uang_makan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Potongan</td>
            <td>Rp. {{ number_format($potongan,'0','.','.') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">Total Gaji</td>
            <td>Rp. {{ number_format($cetakslip->gaji_pokok + $cetakslip->tunjangan + $cetakslip->uang_makan - $potongan,0,'.','.') }}</td>
        </tr>
    </table>

    <table width=100%>
        <tr>
            <td width=200px>
                <p>Pegawai</p>
                <br><br><br>
                <p>{{ $cetakslip->nama_karyawan }}</p>
            </td>
            <td></td>
            <td width=200px>
                <p>Semarang, {{ date('d') }} {{ date('M') }} {{ date('Y') }}
                    <br>Finance
                </p>
                <br><br><br>
                <p>.........................................</p>
            </td>
        </tr>
    </table>
</body>
</html>