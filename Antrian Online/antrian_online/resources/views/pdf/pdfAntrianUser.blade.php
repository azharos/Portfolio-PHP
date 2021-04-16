<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Antrian User</title>
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
      .text-center{
        text-align: center;
      }
      .mb-4{
        margin-bottom: 2em;
      }
      .mb-2{
        margin-bottom: 1em;
      }
      .justify-content-center{
        display: flex;
        /* justify-content: center; */
      }
      .m-3{
        margin : 2em;
      }
      .flex{
        width: 100%;
        padding: 10px;
        border: 2px solid orange;
      }
    </style>
  </head>
  <body>
      <div>
          <h1 style="text-align: center; margin-bottom:2px;">Antrian Online</h1>
          <p class="bb" style="text-align: center; margin-top:2px;">Jl.Sidoasih XI/22 Tlogosari Semarang</p>
      </div>
      <div class="container">
        @foreach ($user as $usr)
        <div class="row mb-4 text-center">
            <h2>{{ $usr->nama_loket }}</h2>
            <h2>No. {{ $usr->nomor }}</h2>
        </div>
        <table style="margin-left: 1em" cellpadding='10'>
          <tr>
            <td style="width: 200px">Nama</td>
            <td>: {{ $usr->username }}</td>
          </tr>
          <tr>
            <td style="width: 200px">No KTP</td>
            <td>: {{ $usr->noktp }}</td>
          </tr>
          <tr>
            <td style="width: 200px">Alamat Rumah</td>
            <td>: {{ $usr->alamat }}</td>
          </tr>
          <tr>
            <td style="width: 200px">Jenis Kelamin</td>
            <td>: {{ $usr->jenis_kelamin }}</td>
          </tr>
          <tr>
            <td style="width: 200px">Tanggal</td>
            <td>: {{ $usr->tanggal }}</td>
          </tr>
        </table>
        <div style="width: 180px; margin-left:auto;margin-top:1.5em;">
          <h5 >
            Semarang, {{ $usr->tanggal }}
            <br>Kepala Antrian Online
          </h5>
          <br><br><br>
          <h5>Azhar Ozhi Saputra</h5>
        </div>
        @endforeach
      </div>


  </body>
</html>
