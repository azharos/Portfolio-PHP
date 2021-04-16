@extends('layout/main')

@section('title','Loket Antrian')

@section('content')
@if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">Nomer Antrian</th>
                <th scope="col">Nama</th>
                <th scope="col">No KTP</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="text-center">
                    <td>{{ $user->nomor }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->noktp }}</td>
                    <td>{{ $user->jenis_kelamin }}</td>
                    <td>
                        @if ($user->status == 'sudah')
                            <span class="badge badge-success">{{ $user->status }}</span>
                        @else
                            <span class="badge badge-danger">{{ $user->status }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        @if ($users->count() == 0)
            <div class="alert alert-danger" role="alert">
                Hari ini belum ada antrian
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('loket') }}" role="button"><i class="fas fa-angle-double-left"></i> Kembali</a>
    </div>
</div>
@endsection