@extends('layout/main')

@section('title', 'Dashboard')

@section('content')
  <!-- Page Heading -->
  <!-- {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Profile</h1>
      </div> --}}

  {{-- <div class="row">
          <div class="col-12">
              <h5>Selamat Datang {{ $nama }} di ANTRIAN ONLINE</h5>
  </div>
  </div> --}} -->

  <div class="row">
    <div class="col-lg-7 mt-2">
      <div class="card shadow-sm">
        <div class="card-header">
          <i class="fas fa-user-cog"></i>&nbsp;Ubah Profile
        </div>
        <div class="card-body">
          @if (session('sukses'))
              <div class="alert alert-success">
                  {{ session('sukses') }}
              </div>
          @endif
          <form action="app/profile" method="POST">
            @method('patch')
            @csrf
            <div class="form-group row">
              <label for="username" class="col-sm-4 col-form-label">Username</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" name="username">
              </div>
            </div>
            <div class="form-group row">
              <label for="noktp" class="col-sm-4 col-form-label">No KTP</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="noktp" value="{{ $user->noktp }}" name="noktp">
              </div>
            </div>
            <div class="form-group row">
              <label for="jeniskelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="jeniskelamin" value="{{ $user->jenis_kelamin }}" readonly name="kelamin">
              </div>
            </div>
            <div class="form-group row">
              <label for="nohp" class="col-sm-4 col-form-label">No HP</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="nohp" value="{{ $user->no_telp }}" name="nohp">
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <textarea class="form-control" name="alamat">{{ $user->alamat }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ubah Profile</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-5 mt-2">
      <div class="card shadow-sm">
        <div class="card-header">
          <i class="fas fa-key"></i>&nbsp;Ganti Password
        </div>
        <div class="card-body">
          @if (session('sukses-password'))
              <div class="alert alert-success">
                  {{ session('sukses-password') }}
              </div>
          @endif
          <form action="app/password" method="POST">
            @method('patch')
            @csrf
            <div class="form-group">
              <label for="password">Password Baru</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password2">Konfirmasi Password Baru</label>
              <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2">
              @error('password2')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Ganti Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection