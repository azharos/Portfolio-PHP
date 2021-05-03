@extends('layout.main')
    
@section('container')
    <h2>Tambah Data Pegawai</h2>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/pegawai" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}">
                    @error('nik')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="np">Nama Pegawai</label>
                    <input type="text" class="form-control @error('np') is-invalid @enderror" name="np" id="np" value="{{ old('np') }}">
                    @error('np')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control @error('pwd') is-invalid @enderror" name="pwd" id="pwd" value="{{ old('pwd') }}">
                    @error('pwd')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="custom-select" id="jk" name="jk">
                        <option selected>-- Pilih --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="{{ old('tgl') }}">
                    @error('tgl')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jbt">Jabatan</label>
                    <select class="custom-select" id="sts" name="jbt">
                        <option selected>-- Pilih Jabatan --</option>
                        @foreach ($jabatan as $jbt)
                            <option value="{{ $jbt->nama_jabatan }}">{{ $jbt->nama_jabatan }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sts">Status</label>
                    <select class="custom-select" id="sts" name="sts">
                        <option selected>-- Pilih Status --</option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Kontrak">Pegawai Kontrak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lvl">Level</label>
                    <select class="custom-select" id="lvl" name="lvl">
                        <option selected>-- Pilih Level --</option>
                        @foreach ($level as $lvl)
                            <option value="{{ $lvl }}">{{ $lvl }}</option>    
                        @endforeach
                    </select>
                </div>
                <label for="customFile">Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile" name="photo">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @error('photo')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                <a href="/admin/pegawai" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection