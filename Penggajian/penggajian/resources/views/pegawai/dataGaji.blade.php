@extends('layout.main')

@section('container')
    <h2>Data Gaji Pegawai</h2>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Filter Data Absensi Pegawai
                </div>
                <div class="card-body d-inline">
                    <form class="form-inline" action="/admin/data-gaji" method="get">
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
                        <button type="submit" class="ml-3 btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>&nbsp;Tampilkan Data</button>
                        @if ($gaji->count() > 0)
                            <a href="/admin/pegawai/cetak-gaji?bulan={{ $bulan }}&tahun={{ $tahun2 }}" target="_blank" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i>&nbsp;Cetak Daftar Gaji</a>    
                        @else
                            <button type="button" disabled class="btn btn-secondary mb-2 ml-3"><i class="fas fa-print"></i>&nbsp;Cetak Daftar Gaji</button>
                        @endif
                        
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Uang Makan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                    </tr>
                    @foreach ($gaji as $gj)
                        @php
                            $potongan = $gj->izin * $izin + $gj->sakit * $sakit + $gj->apha * $alpha;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gj->nik }}</td>
                            <td>{{ $gj->nama_karyawan }}</td>
                            <td>{{ $gj->jenis_kelamin }}</td>
                            <td>{{ $gj->nama_jabatan }}</td>
                            <td>Rp. {{ number_format($gj->gaji_pokok,0,'.','.') }}</td>
                            <td>Rp. {{ number_format($gj->tunjangan,0,'.','.') }}</td>
                            <td>Rp. {{ number_format($gj->uang_makan,0,'.','.') }}</td>
                            <td>Rp. {{ number_format($potongan,0,'.','.') }}</td>
                            <td>Rp. {{ number_format($gj->gaji_pokok + $gj->tunjangan + $gj->uang_makan - $potongan,0,'.','.') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @if ($gaji->count() == 0)
                <span class="badge badge-danger"><i class="fas fa-info-circle"></i>&nbsp;Harap Isi <a href="/admin/absensi?bulan={{ $bulan }}&tahun={{ $tahun2 }}" class="text-white">Data Absensi</a> Terlebih Dahulu</span>
            @endif
        </div>

    </div>
@endsection