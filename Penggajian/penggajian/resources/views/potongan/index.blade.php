@extends('layout.main')

@section('container')
    <h2>Setting Potongan Gaji</h2>

    <div class="row">
        @if ($potongangaji->count() < 3)
            <div class="col-12">
                <a href="/admin/potongan/tambah" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        @endif
        <div class="col-12 mt-3">
            @if (session('sukses'))
                <div class="alert alert-success">
                    {{ session('sukses') }}
                </div>
            @endif
        </div>
        <div class="col-12 mt-2">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <tr>
                        <th>No</th>
                        <th>Jenis Potongan</th>
                        <th>Jumlah Potongan</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($potongangaji as $gaji)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $gaji->jenis_potongan }}</th>
                            <th>Rp. {{ number_format($gaji->jumlah_potongan,0,'.','.') }}</th>
                            <th>
                                <a href="/admin/potongan/edit/{{ $gaji->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <form action="/admin/potongan/{{ $gaji->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Dihapus ?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection