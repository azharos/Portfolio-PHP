<div class="col-md-4">
    <div class="card border-success">
        <h5 class="card-header bg-success text-white text-center">Loket Pembayaran SPP</h5>
        <div class="card-body text-center">
            @if (session('level') == 'admin')
            <h1 style="font-size: 5em">{{ $next_antrian }}</h1>
            <a href="{{ url('loket/loket_antrian') }}" class="btn btn-info mt-2"><i class="fas fa-portrait"></i>&nbsp;Lihat Antrian</a>
            @if ($next_antrian == 0)
            <button type="button" class="btn btn-danger mt-2" disabled>Lanjut Antrian&nbsp;<i class="fas fa-arrow-circle-right"></i></button>
            @else
            @if ($tbl_antrian_admin->count() == 0)
            <button type="button" class="btn btn-danger mt-2" disabled>Lanjut Antrian&nbsp;<i class="fas fa-arrow-circle-right"></i></button>
            @else
            <form action="{{ url('loket/next_antrian') }}" method="post" class="d-inline-block">
                @csrf
                <input type="hidden" name="tanggal" value="<?= date('d-m-Y') ?>">
                <input type="hidden" name="nomor" value="{{ $next_antrian }}">
                <button type="submit" class="btn btn-danger mt-2">Lanjut Antrian&nbsp;<i class="fas fa-arrow-circle-right"></i></button>
            </form>
            @endif
            @endif
            @else
            <h1 style="font-size: 5em">{{ $nomer }}</h1>
            <form action="loket/{{ session('id') }}" method="post">
                @csrf
                <input type="hidden" name="id_user" value="{{ session('id') }}">
                <input type="hidden" name="nomer" value="{{ $nomer }}">
                <input type="hidden" name="tanggal" value="<?= date('d-m-Y') ?>">
                <input type="hidden" name="waktu" value="<?= date('H:i:s') ?>">
                <button type="submit" class="btn btn-success"><i class="fas fa-angle-double-right"></i>&nbsp;Ambil Antrian</button>
            </form>
            @endif
        </div>
    </div>
</div>


// Mencari Nomer Antrian dan Next Antrian
if ($tbl->count() == 0) {
$nomer = 1;
$next_antrian = 0;
$tbl_antrian_admin = 0;
} else {
$loket = DB::table('loket')->get();

foreach ($loket as $lkt2) {
// SELECT * FROM loket_antrian WHERE tanggal = '21-03-2021' AND nama_loket = 'Pembayaran SPP' LIMIT 1
$tbl_antrian = DB::table('loket_antrian')
->orderBy('id', 'desc')
->where('tanggal', date('d-m-Y'))
->where('nama_loket', $lkt2->nama_loket)
->limit(1)
->get();

// SELECT * FROM loket_antrian WHERE tanggal = '15-03-2021' AND status = 'belum' AND nama_loket = 'Pembayaran SPP' LIMIT 1
$tbl_antrian_admin = DB::table('loket_antrian')
->where('tanggal', date('d-m-Y'))
->where('status', 'belum')
->where('nama_loket', $lkt2->nama_loket)
->limit(1)
->get();
}

foreach ($tbl_antrian as $ant) {
$nomer = $ant->nomor + 1;
}

if ($tbl_antrian_admin->count() == 0) {

foreach ($loket as $lkt) {
$tbl_antrian_admin_nomor = DB::table('loket_antrian')
->orderBy('id', 'desc')
->where('tanggal', date('d-m-Y'))
->where('status', 'sudah')
->where('nama_loket', $lkt->nama_loket)
->limit(1)
->get();
}

foreach ($tbl_antrian_admin_nomor as $ant) {
$next_antrian = $ant->nomor;
}
} else {
foreach ($tbl_antrian_admin as $ant) {
$next_antrian = $ant->nomor;
}
}
}