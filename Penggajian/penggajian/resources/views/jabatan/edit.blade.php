@extends('layout.main')

@section('container')
    <h2>Edit Data Jabatan</h2>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/jabatan/{{ $jbt->id }}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $jbt->id }}">
                <div class="form-group">
                    <label for="nama">Nama Jabatan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $jbt->nama_jabatan }}">
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gp">Gaji Pokok</label>
                    <input type="text" class="form-control @error('gp') is-invalid @enderror" name="gp" id="gp" value="{{ $jbt->gaji_pokok }}">
                    @error('gp')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tj">Tunjangan</label>
                    <input type="text" class="form-control @error('tj') is-invalid @enderror" name="tj" id="tj" value="{{ $jbt->tunjangan }}">
                    @error('tj')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="um">Uang Makan</label>
                    <input type="text" class="form-control @error('um') is-invalid @enderror" name="um" id="um" value="{{ $jbt->uang_makan }}">
                    @error('um')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin/jabatan" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection