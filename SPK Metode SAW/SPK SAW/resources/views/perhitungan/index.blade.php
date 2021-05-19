@extends('layout.main')

@section('container')
    <h1 class="mt-4">Perhitungan</h1>
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kandidat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kandidat as $kdt)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kdt->nama }}</td>
                            <td>
                                <a href="/perhitungan/{{ $kdt->id }}" class="badge badge-info">
                                    <i class="fas fa-info"></i>&nbsp;Info
                                </a>
                            </td>
                        </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection