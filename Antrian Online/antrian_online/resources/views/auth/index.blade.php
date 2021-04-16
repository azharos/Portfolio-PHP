<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css ">
    <title>Antrian Online</title>
    <style>
        .my-row {
            width: 100%;
        }

        .d-flex {
            flex-direction: column;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Antrian Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container pt-5 mt-5 pb-5 mb-5">
        <div class="row">
            @foreach ($loket as $lkt)
                @php
                    date_default_timezone_set('Asia/Jakarta');
                    $tbl = DB::table('loket_antrian')
                            ->where('tanggal', date('d-m-Y'))
                            ->where('nama_loket', $lkt->nama_loket)
                            ->get();

                        if ($tbl->count() == 0) {
                            $nomer = 0;
                        } else {
                            $tbl_antrian_user = DB::table('loket_antrian')
                                ->orderBy('id', 'desc')
                                ->where('tanggal', date('d-m-Y'))
                                ->where('nama_loket', $lkt->nama_loket)
                                ->limit(1)
                                ->get();

                            foreach ($tbl_antrian_user as $ant) {
                                $nomer = $ant->nomor;
                            }
                        }
                @endphp
                <div class="col-md-6 mt-2">
                    <div class="card border-success">
                        <h5 class="card-header bg-success text-white text-center">{{ $lkt->nama_loket }}</h5>
                        <div class="card-body text-center">
                            <h1 style="font-size: 5em">{{ $nomer }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="my-row d-flex justify-content-center align-items-center" style="height: 90vh;">
        <h1 class="fw-bold" style="letter-spacing: 2px;">Nomer Antrian : {{ $nomer }}</h1>
        <h3 class="text-muted"><span id="tgl"></span>&nbsp;<span id="bulan"></span>&nbsp;<span id="thn"></span></h3>
    </div> --}}

    <div class="my-row d-flex justify-content-center align-items-center bg-danger text-white" style="height: 90vh;">
        <h1 class="fw-bold" style="letter-spacing: 2px;">Antrian Online</h1>
        <h3 class="text-light">Jika belum punya akun, silahkan Registrasi dahulu.</h3>
        <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#registrasi">Registrasi</button>
    </div>

    <div class="my-row p-5 bg-dark">
        <div class="col-12 text-center">
            <a href="https://www.linkedin.com/in/azhar-ozhi-saputra-95b6521a5/" class="text-light me-2"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="https://wa.me/6285641532396" class="text-light me-2"><i class="fab fa-whatsapp fa-2x"></i></a>
            <a href="https://github.com/azharos" class="text-light me-2"><i class="fab fa-github fa-2x"></i></a>
            <a href="https://web.facebook.com/ozhi.saputra.16" class="me-2 text-light"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCZVK-ANlL8ANh-TqSmjIypg" class="text-light"><i class="fab fa-2x fa-youtube"></i></a>

            <h5 class="text-light mt-5 user-select-none">Copyright &copy; Azhar Ozhi Saputra</h5>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registrasi" tabindex="-1" aria-labelledby="registrasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrasiLabel">Registrasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username :</label>
                            <input type="text" value="{{ old('username') }}" name="username" class="@error('username') is-invalid @enderror form-control" id="username">
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" id="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noktp" class="form-label">No KTP :</label>
                            <input type="noktp" value="{{ old('noktp') }}" name="noktp" class="@error('noktp') is-invalid @enderror form-control" id="noktp">
                            @error('noktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin :</label>
                            <select name="jeniskelamin" class="form-select" aria-label="Default select example">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat :</label>
                            <textarea name="alamat" class="@error('alamat') is-invalid @enderror form-control" style="width: 100%;" id="alamat"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No Telepon :</label>
                            <input type="notelp" value="{{ old('notelp') }}" name="notelp" class="@error('notelp') is-invalid @enderror  form-control" id="notelp">
                            @error('notelp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Tanggal
        const date = new Date().getDate();
        // console.log(date);

        // Bulan
        const m = new Date().getMonth();
        const bln = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        // console.log(bln[m]);

        // Tahun
        const y = new Date().getFullYear();
        // console.log(y);

        document.getElementById('tgl').innerHTML = date;
        document.getElementById('bulan').innerHTML = bln[m];
        document.getElementById('thn').innerHTML = y;

    </script>
</body>

</html>