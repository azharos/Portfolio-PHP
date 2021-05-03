@extends('layout.main')

@section('container')
    <h2>Edit Potongan Gaji</h2>

    <div class="row">
        <div class="col-5 mt-3">
            <form action="/admin/potongan/{{ $tb_potonganGaji->id }}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="jenis">Jenis Potongan</label>
                    <select class="form-control" id="jenis" name="jns_potongan">
                    @foreach ($jns_potongan as $jns)
                        @if ($jns == $tb_potonganGaji->jenis_potongan)
                            <option value="{{ $jns }}" selected>{{ $jns }}</option>   
                        @else
                            <option value="{{ $jns }}">{{ $jns }}</option>    
                        @endif
                    @endforeach
                    </select>
                </div>
                <label for="jmlh">Jumlah Potongan</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="text" id="jmlh" value="{{ $tb_potonganGaji->jumlah_potongan }}" class="form-control @error('jmlh_potongan') is-invalid @enderror" name="jmlh_potongan">
                    @error('jmlh_potongan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin/potongan-gaji" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection