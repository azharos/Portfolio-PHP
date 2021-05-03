@extends('layout.main')

@section('container')
    <h2>Data Absensi Pegawai</h2>

    <!-- Content Row -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Input Absensi Pegawai
                </div>
                <div class="card-body">
                    <form class="form-inline" action="/admin/absensi/input-absensi" method="get">
                        <div class="form-group mb-2">
                          <label for="bulan">Bulan : &nbsp;</label>
                          <select class="form-control" name="bulan">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="form-group mb-2 ml-3">
                            <label for="bulan">Tahun : &nbsp;</label>
                            <select class="form-control" name="tahun">
                                <option value="">-- Pilih Tahun --</option>
                                @foreach ($tahun1 as $thn)
                                    <option value="{{ $thn }}">{{ $thn }}</option>
                                @endforeach
                            </select>
                          </div>
                        <button type="submit" class="ml-3 btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>&nbsp;Generate</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="alert alert-info mt-3">
                Menampilkan Data Kehadiran Bulan : <span class="font-weight-bold">{{ $bulan }}</span> Tahun : <span class="font-weight-bold">{{ $tahun2 }}</span>
            </div>
        </div>

        <div class="col-12">
            <form action="/admin/absensi/input-absensi" method="post">
                @csrf
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Alpha</th>
                        </tr>
                        @foreach ($tb_inputAbsensi as $abs)
                            <input type="hidden" name="blnthn[]" value="{{ $blnthn }}">
                            <input type="hidden" name="nik[]" value="{{ $abs->nik }}">
                            <input type="hidden" name="nama[]" value="{{ $abs->nama_pegawai }}">
                            <input type="hidden" name="jk[]" value="{{ $abs->jenis_kelamin }}">
                            <input type="hidden" name="jbt[]" value="{{ $abs->jabatan }}">
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $abs->nik }}</td>
                                <td>{{ $abs->nama_pegawai }}</td>
                                <td>{{ $abs->jenis_kelamin }}</td>
                                <td>{{ $abs->jabatan }}</td>
                                <td><input type="number" class="form-control" name="hadir[]" value="0"></td>
                                <td><input type="number" class="form-control" name="sakit[]" value="0"></td>
                                <td><input type="number" class="form-control" name="izin[]" value="0"></td>
                                <td><input type="number" class="form-control" name="alpha[]" value="0"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if ($tb_inputAbsensi->count() > 0)
                    <button type="submit" class="btn btn-success">Simpan</button>
                @endif
            </form>
            @if ($tb_inputAbsensi->count() == 0)
                <span class="badge badge-danger"><i class="fas fa-info-circle"></i>&nbsp;Data Sudah Diinput</span>
            @endif
        </div>
    </div>
@endsection