@extends('layout.main')

@section('container')
    <h1 class="mt-4">Aplikasi SPK Metode SAW</h1>
    <p class="lead">Metode Simple Additive Weighing atau SAW dikenal istilah metode penjumlahan terbobot</p>
    <p class="lead">Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari ranting kinerja pada setiap alternatif pada semua atribut (Fishburn, 1967) dan (Mac Crimmon, 1968).</p>
    <p class="lead">Metode SAW membutuhkan proses normalisasi matriks keputusan (x) ke suatu skala yang dapat diperbandingkan dengan semua rating alternatif yang ada.</p>
    <p class="lead mb-1">Tahapan metode SAW :</p>
    <ol type="1" class="lead">
        <li>Menentukan kriteria dan alternatif.</li>
        <li>Memberikan bobot kepada masing-masing kriteria.</li>
        <li>Membuat matrik keputusan dan normalisasi.</li>
        <li>Melakukan perangkingan berdasarkan nilai terbesar.</li>
    </ol>
@endsection