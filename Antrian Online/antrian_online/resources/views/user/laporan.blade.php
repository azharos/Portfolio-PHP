@extends('layout/main')

@section('title','Laporan Antrian')

@section('content')
   <div class="row mb-3">
       <div class="col">
           <h2>Laporan Antrian</h2>
       </div>
   </div>
   <div class="row">
       <div class="col">
           <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">PDF</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($laporan as $lp)
                            <tr>
                                <th scope="row">{{ $loop->index + $laporan->firstItem() }}</th>
                                <td>{{ $lp->tanggal }}</td>
                                <td>
                                    <form action="laporan/{{ $lp->tanggal }}" method="post">
                                        @csrf
                                        <input type="hidden" name="tanggal" value="{{ $lp->tanggal }}">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $laporan->links() }}
            </div>
       </div>
   </div>
@endsection