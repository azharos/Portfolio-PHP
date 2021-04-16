<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Laporan</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .row{
            width: 100%;
        }
        .bb{
            padding-bottom: 1em;
            border-bottom: 2px solid rgb(0, 0, 0);
            margin-bottom: 1.5em;
            letter-spacing: 2px;
        }
        .w-100{
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
        <h1 style="text-align: center; margin-bottom:2px;">Antrian Online</h1>
        <p class="bb" style="text-align: center; margin-top:2px;">Jl.Sidoasih XI/22 Tlogosari Semarang</p>
    </div>
    <div class="container">
        @foreach ($nama_loket as $nl)
            @php
                // SELECT * FROM `loket_antrian` JOIN `user` ON `loket_antrian`.`id_user` = `user`.`id` WHERE tanggal = '07-04-2021' AND nama_loket = 'Pembayaran SPP
                $users = DB::table('loket_antrian')
                    ->join('user', 'loket_antrian.id_user', '=', 'user.id')
                    ->where('tanggal', $tanggal)
                    ->where('nama_loket', $nl->nama_loket)
                    ->select('*')
                    ->get();
            @endphp
            <h3>{{ $nl->nama_loket }}</h3>
            <table class="w-100" border="1" cellspacing=0 style="margin-bottom: 1.5em">
                <tr style="text-align: center">
                    <td>No</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>No KTP</td>
                </tr>
                @foreach ($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->noktp }}</td>
                    </tr>
                @endforeach
            </table>
        @endforeach
        <div style="width: 180px; margin-left:auto;margin-top:1.5em;">
            <h5 >
              Semarang, {{ $tanggal }}
              <br>Kepala Antrian Online
            </h5>
            <br><br><br>
            <h5>Azhar Ozhi Saputra</h5>
        </div>
    </div>
</body>
</html>