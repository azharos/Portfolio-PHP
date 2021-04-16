@extends('layout/main')

@section('title','Loket Antrian')

@section('content')
    @if (session('level') == 'admin')
        <div class="row">
            <div class="col">
                <div class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#tambahLoket">Tambah Loket</div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahLoket" tabindex="-1" aria-labelledby="tambahLoketLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLoketLabel">Tambah Loket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('loket/add_loket') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="Nama Loket">Loket</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nama Loket" aria-label="Nama Loket" aria-describedby="Nama Loket" name="nama_loket">
                              </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if ($all_loket->count() == 0)
        <div class="alert alert-secondary">
            Belum Ada Loket Antrian
        </div>
    @else
        @if ($jam <= session('jamTutup') && $jam >= session('jambuka'))
            <div class="row justify-content-center pb-3">
                @foreach ($all_loket as $loket)
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $jam = date('H');
                        
                        $tbl = DB::table('loket_antrian')
                            ->where('tanggal', date('d-m-Y'))
                            ->where('nama_loket', $loket->nama_loket)
                            ->get();

                        if ($tbl->count() == 0) {
                            $nomer = 1;
                            $next_antrian = 0;
                            $tbl_antrian_admin = 0;
                        } else {
                            // Tabel Antrian User
                            $tbl_antrian_user = DB::table('loket_antrian')
                                ->orderBy('id', 'desc')
                                ->where('tanggal', date('d-m-Y'))
                                ->where('nama_loket', $loket->nama_loket)
                                ->limit(1)
                                ->get();
                            
                            foreach ($tbl_antrian_user as $ant) {
                                $nomer = $ant->nomor + 1;
                            }

                            // Tabel Antrian Admin (Next Antrian)
                            $tbl_antrian_admin = DB::table('loket_antrian')
                                ->where('tanggal', date('d-m-Y'))
                                ->where('status', 'belum')
                                ->where('nama_loket', $loket->nama_loket)
                                ->limit(1)
                                ->get();

                            if ($tbl_antrian_admin->count() == 0) {

                                $tbl_antrian_admin_nomor = DB::table('loket_antrian')
                                    ->orderBy('id', 'desc')
                                    ->where('tanggal', date('d-m-Y'))
                                    ->where('status', 'sudah')
                                    ->where('nama_loket', $loket->nama_loket)
                                    ->limit(1)
                                    ->get();

                                foreach ($tbl_antrian_admin_nomor as $ant) {
                                    $next_antrian = $ant->nomor;
                                }
                            } else {
                                foreach ($tbl_antrian_admin as $ant) {
                                    $next_antrian = $ant->nomor;
                                }
                            }
                        }
                    @endphp
                    <div class="col-md-4">
                        <div class="card border-success">
                            <h5 class="card-header bg-success text-white text-center">Loket {{ $loket->nama_loket }}</h5>
                            <div class="card-body text-center">
                                @if (session('level') == 'admin')
                                    <h1 style="font-size: 5em">{{ $next_antrian }}</h1>
                                    <form action="{{ url('loket/loket_antrian') }}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="nama_loket" value="{{ $loket->nama_loket }}">
                                        <button type="submit" class="btn btn-info mt-2"><i class="fas fa-portrait"></i>&nbsp;Lihat Antrian</button>
                                    </form>
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
                                                <input type="hidden" name="nama_loket" value="{{ $loket->nama_loket }}">
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
                                        <input type="hidden" name="nama_loket" value="{{ $loket->nama_loket }}">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-angle-double-right"></i>&nbsp;Ambil Antrian</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach          
            </div>
        @else
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger text-center">
                        Antrian Sudah Tutup !!!
                    </div>
                </div>
            </div>
        @endif
    @endif
    @if (session('level') == 'admin')
        <div class="row text-dark pt-3 border-top">
            <div class="col">
                <h5>Pengaturan Jam</h5>
            </div>
        </div>
        <form action="{{ url('loket/waktu') }}" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jamBuka" class="col-sm-4 col-form-label">Jam Buka :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jamBuka" name="jamBuka">
                                @foreach ($jamBuka as $jb)
                                    @if ($jb == session('jambuka'))
                                        <option value="{{ $jb }}" selected>{{ $jb }}</option>
                                    @else
                                        <option value="{{ $jb }}">{{ $jb }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jamTutup" class="col-sm-4 col-form-label">Jam Tutup :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jamTutup" name="jamTutup">
                                @foreach ($jamTutup as $jt)
                                    @if ($jt == session('jamTutup'))
                                        <option value="{{ $jt }}" selected>{{ $jt }}</option>
                                    @else
                                        <option value="{{ $jt }}">{{ $jt }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Setting Jam</button>
                </div>
            </div>
        </form>
        @if ($all_loket->count() > 0)
            <div class="row text-dark">
                <div class="col">
                    <h5>Pengaturan Loket</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-7">
                    <table class="table table-bordered text-black" style="border: 2px solid rgba(0,0,0,0.5)">
                        <thead>
                            <tr class="text-center">
                                <th scope="col " style="border: 2px solid rgba(0,0,0,0.5)">Nama Loket</th>
                                <th scope="col font-weight-bold" style="border: 2px solid rgba(0,0,0,0.5)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_loket as $lkt)
                                <tr class="text-center">
                                    <td style="border: 2px solid rgba(0,0,0,0.5)">{{ $lkt->nama_loket }}</td>
                                    <td style="border: 2px solid rgba(0,0,0,0.5)">
                                        <form action="loket/{{ $lkt->nama_loket }}/delete" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="nama_loket" value="{{ $lkt->nama_loket }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
    @if (session('level') == 'user')
        <div class="row border-top pt-3">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Loket</th>
                            <th scope="col">Nomer Antrian</th>
                            <th scope="col">Download</th>
                        </tr>
                        <tbody class="text-center">
                            @foreach ($user_ant as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama_loket }}</td>
                                <td>{{ $user->nomor }}</td>
                                <td>
                                    <form action="{{ url('pdf-antrian-user') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{ session('id') }}">
                                        <input type="hidden" name="nama_loket" value="{{ $user->nama_loket }}">
                                        <input type="hidden" name="tanggal" value="{{ $user->tanggal }}">
                                        <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-download"></i></button>
                                    </form>
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                @if ($user_ant->count() == 0)
                    <h3>Belum Ambil Antrian</h3>
                @endif
            </div>
        </div>
    @endif
@endsection