@extends('layout.main')

@section('container')
    <h1 class="mt-4">Hasil Kandidat</h1>
    <table class="table mt-3">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kandidat as $kdt)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kdt->nama }}</td>
                    <td>
                        @if ($kdt->hasil == null)
                            <form action="hasil/kandidat/{{ $kdt->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-caret-square-right"></i>&nbsp;Generate
                                </button>
                            </form>
                        @else
                            {{ $kdt->hasil }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection