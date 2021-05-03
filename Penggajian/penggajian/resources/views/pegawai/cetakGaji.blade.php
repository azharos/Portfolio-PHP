<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Gaji Pegawai</title>
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
        <h2>Daftar Gaji Pegawai</h2>
    </center>

    <table>
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

    <table style="width: 100%; text-align:center;" border="1" cellspacing=0 cellpadding=10>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
        </tr>
        @foreach ($cetakgaji as $gj)
            @php
                $potongan = $gj->izin * $izin + $gj->sakit * $sakit + $gj->apha * $alpha;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gj->nik }}</td>
                <td>{{ $gj->nama_karyawan }}</td>
                <td>{{ $gj->jenis_kelamin }}</td>
                <td>{{ $gj->nama_jabatan }}</td>
                <td>Rp. {{ number_format($gj->gaji_pokok,0,'.','.') }}</td>
                <td>Rp. {{ number_format($gj->tunjangan,0,'.','.') }}</td>
                <td>Rp. {{ number_format($gj->uang_makan,0,'.','.') }}</td>
                <td>Rp. {{ number_format($potongan,0,'.','.') }}</td>
                <td>Rp. {{ number_format($gj->gaji_pokok + $gj->tunjangan + $gj->uang_makan - $potongan,0,'.','.') }}</td>
            </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Semarang, {{ date('d') }} {{ date('M') }} {{ date('Y') }}
                    <br>Finance
                </p>
                <br>
                <br>
                <br>
                <p>.......................................</p>
            </td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>