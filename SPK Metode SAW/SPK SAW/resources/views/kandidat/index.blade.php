@extends('layout.main')

@section('container')
    <h1 class="mt-4">Kandidat</h1>
    <div class="row">
        <div class="col-12">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
            <i class="fas fa-plus"></i>&nbsp;Tambah
          </button>

          @if (session('sukses'))
            <div class="alert alert-success mt-3">
                {{ session('sukses') }}
            </div>
          @endif
            
          <!-- Modal -->
          <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title m-auto" id="tambahLabel">Tambah Kandidat</h5>
                </div>
                <div class="modal-body">
                  <form action="/kandidat-tambah" method="post" autocomplete="off">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="job">Pekerjaan :</label>
                    <input type="text" class="form-control" id="job" name="job">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <small id="emailHelp" class="form-text text-muted">Contoh : Semarang, Jawa Tengah</small>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 mt-2">
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($all_kandidat as $kdt)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $kdt->nama }}</td>
                      <td>{{ $kdt->pekerjaan }}</td>
                      <td>{{ $kdt->alamat }}</td>
                      <td>
                        <a href="/kandidat/{{ $kdt->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="/kandidat/{{ $kdt->id }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection