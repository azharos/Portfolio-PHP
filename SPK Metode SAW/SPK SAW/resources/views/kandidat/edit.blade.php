@extends('layout.main')

@section('container')
    <h1 class="mt-4">Edit Kandidat</h1>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="/kandidat/{{ $kdt->id }}" method="post" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kdt->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="job">Pekerjaan :</label>
                            <input type="text" class="form-control" id="job" name="job" value="{{ $kdt->pekerjaan }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kdt->alamat }}">
                            <small id="emailHelp" class="form-text text-muted">Contoh : Semarang, Jawa Tengah</small>
                        </div>
                        <a href="/kandidat" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-left"></i>&nbsp;Kembali</a>
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection