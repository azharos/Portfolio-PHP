@extends('layout.main')

@section('container')
    <h1 class="mt-4">Hasil Kriteria</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-link active" id="nav-benefit-tab" data-toggle="tab" href="#nav-benefit" role="tab" aria-controls="nav-benefit" aria-selected="true">Benefit</a>
                          <a class="nav-link" id="nav-cost-tab" data-toggle="tab" href="#nav-cost" role="tab" aria-controls="nav-cost" aria-selected="false">Cost</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-benefit" role="tabpanel" aria-labelledby="nav-benefit-tab">
                            @if (session('sukses'))
                                <div class="alert alert-warning mt-2">{{ session('sukses') }}</div>    
                            @endif
                            @if ($benefit->count() > 0)
                                <ul class="list-group mt-3">
                                    @foreach ($benefit as $bnt)
                                        <li class="list-group-item">
                                            {{ $bnt->nama }}
                                            @if ($bnt->status == null)
                                                <form action="/hasil/{{ $bnt->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="jenis_ktr" value="{{ $bnt->jenis_kriteria }}">
                                                    <button type="submit" style="border: none" class="float-right badge badge-warning ml-1"><i class="fas fa-caret-square-right"></i>&nbsp;Generate</button>
                                                </form>
                                            @else
                                                <span class="float-right badge badge-success ml-1"><i class="fas fa-check"></i></span>
                                            @endif
                                        </li>
                                        @endforeach
                                </ul>
                            @else
                                ...
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-cost" role="tabpanel" aria-labelledby="nav-cost-tab">
                            @if ($cost->count() > 0)
                                <ul class="list-group mt-3">
                                    @foreach ($cost as $cst)
                                        <li class="list-group-item">
                                            {{ $cst->nama }}
                                            @if ($cst->status == null)
                                                <form action="/hasil/{{ $cst->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="jenis_ktr" value="{{ $cst->jenis_kriteria }}">
                                                    <button type="submit" style="border: none" class="float-right badge badge-warning ml-1"><i class="fas fa-caret-square-right"></i>&nbsp;Generate</button>
                                                </form>    
                                            @else
                                                <span class="float-right badge badge-success ml-1"><i class="fas fa-check"></i></span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                ...
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if ($status->count() == 0)
                <form action="/hasil" method="post">
                    @csrf
                    <button disabled type="submit" class="btn btn-danger mt-3">
                        Next&nbsp;<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </form> 
            @elseif($status->count() == $kriteria)
                <form action="/hasil" method="post">
                    @csrf
                    <button type="submit" class="btn btn-info mt-3">
                        Next&nbsp;<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </form>
            @else
                <form action="/hasil" method="post">
                    @csrf
                    <button disabled type="submit" class="btn btn-danger mt-3">
                        Next&nbsp;<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </form> 
            @endif
        </div>
    </div>
@endsection