@extends('layout.main')

@section('container')
    <h2>Data Pegawai</h2>
    <a href="/admin/pegawai/tambah" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
    @if (session('sukses'))
        <div class="alert alert-success mt-2">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
          <tr class="text-center">
              <th>No</th>
              <th>NIK</th>
              <th>Nama Pegawai</th>
              <th>Jenis Kelamin</th>
              <th>Jabatan</th>
              <th>Tanggal Masuk</th>
              <th>Status</th>
              <th>Photo</th>
              <th>Action</th>
          </tr>
          @foreach ($pegawais as $pgw)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <th>{{ $pgw->nik }}</th>
                <td>{{ $pgw->nama_pegawai }}</td>
                <td>{{ $pgw->jenis_kelamin }}</td>
                <td>{{ $pgw->jabatan }}</td>
                <td>{{ $pgw->tanggal_masuk }}</td>
                <td>{{ $pgw->status }}</td>
                <td>
                    <img src="{{ asset('photo/' . $pgw->photo ) }}" alt="" width="50px">
                </td>
                <td>
                    <a href="/admin/pegawai/edit/{{ $pgw->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="/admin/pegawai/{{ $pgw->id }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $pgw->id }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Dihapus ?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
          @endforeach
        </table>
    </div>
@endsection