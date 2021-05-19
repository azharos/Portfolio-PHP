@extends('layout.main')

@section('container')
    <h1 class="mt-4">Info {{ $kdt->nama }}</h1>
    <div class="row">
        <div class="col-md-5 col-12">
            @if ($cek_kdt->count() > 0)
                <h5>Edit Nilai Kriteria</h5>    
            @else
                <h5>Tambah Nilai Kriteria</h5>        
            @endif
        </div>
        <div class="col-12">
            <form action="/perhitungan/{{ $kdt->id }}" method="post" autocomplete="off" class="d-inline">
                @if ($cek_kdt->count() > 0)
                    @method('put')
                @endif
                @csrf
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Nilai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cek_kdt->count() > 0)
                            @for ($i = 0; $i < $cek_kdt->count(); $i++)
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td scope="row">{{ $kriteria[$i]->nama }}</td>
                                <td>
                                    <input type="hidden" name="id_kdt[]" value="{{ $kdt->id }}">
                                    <input type="text" name="nilai[]" value="{{ $cek_kdt[$i]->nilai }}" required>
                                </td>
                                <td><span class="badge badge-warning">Nilai yang diberikan antara 0-1</span></td>
                            </tr>
                            @endfor
                        @else
                            @foreach ($kriteria as $ktr)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $ktr->nama }}</td>
                                    <td>
                                        <input type="hidden" name="id_kandidat[]" value="{{ $kdt->id }}">
                                        <input type="hidden" name="id_kriteria[]" value="{{ $ktr->id }}">
                                        <input type="text" name="nilai[]" required>
                                    </td>
                                    <td><span class="badge badge-warning">Nilai yang diberikan antara 0-1</span></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <button type="submit" class="btn btn-info">Simpan</button>
            </form>
            <form action="/perhitungan" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-secondary">Kembali</button>
            </form>
        </div>
    </div>
@endsection