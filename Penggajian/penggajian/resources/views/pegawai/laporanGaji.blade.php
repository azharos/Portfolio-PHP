@extends('layout.main')

@section('container')
<div class="container-fluid" style="width: 40%">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            Filter Laporan Gaji Pegawai
        </div>
        <div class="card-body">
            <form action="/admin/pegawai/cetak-gaji" method="get">
                <div class="form-group row">
                    <label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="bulan" name="bulan">
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
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="tahun">
                            <option value="">-- Pilih Tahun --</option>
                            @foreach ($tahun as $thn)
                                <option value="{{ $thn }}">{{ $thn }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-100 btn btn-primary mt-3"><i class="fas fa-print"></i>&nbsp;Cetak Laporan Gaji</button>
            </form>
        </div>
    </div>
</div>
@endsection