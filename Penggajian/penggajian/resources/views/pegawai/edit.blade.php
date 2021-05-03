@extends('layout.main')

@section('container')
    <h2>Edit Data Pegawai</h2>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/admin/pegawai/{{ $pgw->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $pgw->id }}">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ $pgw->nik }}">
                    @error('nik')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="np">Nama Pegawai</label>
                    <input type="text" class="form-control @error('np') is-invalid @enderror" name="np" id="np" value="{{ $pgw->nama_pegawai }}">
                    @error('np')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="custom-select" id="jk" name="jk">
                        <option selected>-- Pilih --</option>
                        @foreach ($kelamin as $klm)
                            @if ($klm == $pgw->jenis_kelamin)
                                <option value="{{ $pgw->jenis_kelamin }}" selected>{{ $pgw->jenis_kelamin }}</option>
                            @else
                                <option value="{{ $klm }}">{{ $klm }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="{{ $pgw->tanggal_masuk }}">
                    @error('tgl')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jbt">Jabatan</label>
                    <select class="custom-select" id="sts" name="jbt">
                        <option>-- Pilih Jabatan --</option>
                        @foreach ($jabatan as $jbt)
                            @if ($pgw->jabatan == $jbt->nama_jabatan)
                                <option value="{{ $jbt->nama_jabatan }}" selected>{{ $jbt->nama_jabatan }}</option>   
                            @else
                                <option value="{{ $jbt->nama_jabatan }}">{{ $jbt->nama_jabatan }}</option>   
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sts">Status</label>
                    <select class="custom-select" id="sts" name="sts">
                        <option>-- Pilih Status --</option>
                        @foreach ($status as $sts)
                            @if ($sts == $pgw->status)
                                <option value="{{ $pgw->status }}" selected>{{ $pgw->status }}</option>
                            @else
                                <option value="{{ $sts }}">{{ $sts }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label for="customFile">Photo</label><br>
                <img src="{{ asset('./photo/' . $pgw->photo) }}" alt="" width="100px">
                <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile" name="photo">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @error('photo')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Edit</button>
                <a href="/admin/pegawai" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection