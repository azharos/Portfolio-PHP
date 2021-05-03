@extends('layout.user')

@section('container')
    <h2>Data Gaji Pegawai</h2>

    <table class="table table-striped table-bordered text-center mt-3">
        <tr>
            <th>Bulan/Tahun</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip</th>
        </tr>
        @foreach ($slipuser as $user)
            @php
                $potongan = $user->izin * $izin + $user->sakit * $sakit + $user->apha * $alpha;
            @endphp
            <tr>
                <td>{{ $user->bulan }}</td>
                <td>Rp. {{ number_format($user->gaji_pokok,'0','.','.') }}</td>
                <td>Rp. {{ number_format($user->tunjangan,'0','.','.') }}</td>
                <td>Rp. {{ number_format($user->uang_makan,'0','.','.') }}</td>
                <td>Rp. {{ number_format($potongan,'0','.','.') }}</td>
                <td>Rp. {{ number_format($user->gaji_pokok + $user->tunjangan + $user->uang_makan - $potongan,0,'.','.') }}</td>
                <td>
                    <form action="/user/cetakslip/{{ $user->id }}" method="post">
                        @csrf
                        <input type="hidden" name="blnthn" value="{{ $user->bulan }}">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-print"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection