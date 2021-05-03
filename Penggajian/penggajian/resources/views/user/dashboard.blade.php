@extends('layout.user')

@section('container')
    <h2>Halaman Pegawai</h2>
    
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                Selamat datang {{ session('nama') }}, Anda login sebagai {{ session('level') }}
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header font-weight-bold bg-primary text-white">
                    Data Pegawai
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('photo/' . $pegawai->photo ) }}" width="200px">
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td>Nama Pegawai</td>
                                    <td>:</td>
                                    <td>{{ $pegawai->nama_pegawai }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td>{{ $pegawai->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk</td>
                                    <td>:</td>
                                    <td>{{ $pegawai->tanggal_masuk }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $pegawai->status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection