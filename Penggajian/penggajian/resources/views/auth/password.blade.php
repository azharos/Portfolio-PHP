@extends('layout.main')

@section('container')
    <h2>Ganti Password</h2>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form action="/ubah-password" method="post" autocomplete="off">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ session('id') }}">
                        <div class="form-group">
                            <label for="pwd1">Password Baru</label>
                            <input type="password" class="form-control @error('pwd1') is-invalid @enderror" name="pwd1" id="pwd1">
                            @error('pwd1')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Ulang Password Baru</label>
                            <input type="password" class="form-control @error('pwd2') is-invalid @enderror" name="pwd2" id="pwd2">
                            @error('pwd2')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>&nbsp;Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection