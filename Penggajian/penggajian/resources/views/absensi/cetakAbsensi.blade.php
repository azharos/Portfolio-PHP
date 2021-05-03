<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Absensi</title>
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
        <h2>Laporan Absensi</h2>
    </center>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{ $bln }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ $thn }}</td>
        </tr>
    </table>

    <table style="width: 100%; text-align:center;" border="1" cellspacing=0 cellpadding=10>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Izin</th>
            <th>Sakit</th>
            <th>Alpha</th>
        </tr>
        @foreach ($absensi as $abs)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $abs->nama_karyawan }}</td>
                <td>{{ $abs->nik }}</td>
                <td>{{ $abs->nama_jabatan }}</td>
                <td>{{ $abs->hadir }}</td>
                <td>{{ $abs->izin }}</td>
                <td>{{ $abs->sakit }}</td>
                <td>{{ $abs->apha }}</td>
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

    {{-- <script>
        window.print();
    </script> --}}
</body>
</html>