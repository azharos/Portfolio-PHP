@extends('layout.main')

@section('container')
    <h2>Data Jabatan</h2>
    <a href="/admin/jabatan/tambah" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
    @if (session('sukses'))
        <div class="alert alert-success mt-2">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
          <tr class="text-center">
              <th>No</th>
              <th>Nama Jabatan</th>
              <th>Gaji Pokok</th>
              <th>Tunjangan</th>
              <th>Uang Makan</th>
              <th>Total</th>
              <th>Action</th>
          </tr>
          @foreach ($alljabatan as $jbt)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jbt->nama_jabatan }}</td>
                <td>Rp. {{ number_format($jbt->gaji_pokok,0,',','.') }}</td>
                <td>Rp. {{ number_format($jbt->tunjangan,0,',','.') }}</td>
                <td>Rp. {{ number_format($jbt->uang_makan,0,',','.') }}</td>
                <td>Rp. {{ number_format($jbt->uang_makan + $jbt->tunjangan + $jbt->gaji_pokok,0,',','.') }}</td>
                <td>
                    <a href="/admin/jabatan/edit/{{ $jbt->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="/admin/jabatan/{{ $jbt->id }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $jbt->id }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Dihapus ?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
          @endforeach
        </table>
    </div>
@endsection