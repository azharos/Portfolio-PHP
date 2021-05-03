@extends('layout.main')

@section('container')
    <h2>Tambah Potongan Gaji</h2>

    <div class="row">
        <div class="col-5 mt-3">
            <form action="/admin/potongan-gaji" method="post" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis Potongan</label>
                    <select class="form-control" id="jenis" name="jns_potongan">
                      @foreach ($jns_potongan as $jns)
                        <option value="{{ $jns }}">{{ $jns }}</option>
                      @endforeach
                    </select>
                </div>
                <label for="jmlh">Jumlah Potongan</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="text" id="jmlh" class="form-control @error('jmlh_potongan') is-invalid @enderror" name="jmlh_potongan">
                    @error('jmlh_potongan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/admin/potongan-gaji" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection