@extends('layout.main')

@section('container')
    <h1 class="mt-4">Kriteria</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">
      <i class="fas fa-plus"></i>&nbsp;Tambah
    </button>
      
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title m-auto" id="tambahLabel">Tambah Kriteria</h5>
          </div>
          <div class="modal-body">
            <form action="/kriteria-tambah" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
              <label for="nama">Nama :</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
              <label for="bobot">Bobot :</label>
              <input type="text" class="form-control" id="bobot" name="bobot">
              <small class="form-text text-muted">Pengisian Bobot mulai dari 0-1</small>
            </div>
            <div class="form-group">
              <label for="kriteria">Jenis Kriteria : </label>
              <select class="form-control" id="kriteria" name="jns_kriteria">
                  <option selected>-- Pilih Salah Satu</option>
                  @foreach ($jenis as $jns)
                      <option value="{{ $jns }}">{{ $jns }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        @if (session('sukses'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mt-2">
          <div class="card shadow-sm">
              <div class="card-header bg-success text-white">
                <i class="fas fa-address-card"></i>&nbsp;Benefit 
              </div>
              <ul class="list-group list-group-flush">
                @if ($benefit->count() < 1)
                  <li class="list-group-item">Tidak Ada Benefit</li>
                @else
                  @foreach ($benefit as $bnt)
                    <li class="list-group-item">
                        {{ $bnt->nama }}
                        <form action="/kriteria/{{ $bnt->id }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" style="border: none" class="float-right badge badge-danger ml-1"><i class="fas fa-trash"></i></button>
                        </form>
                        <span style="cursor: pointer" data-toggle="modal" data-target="#edit{{ $bnt->id }}" href="" class="float-right badge badge-warning ml-1"><i class="fas fa-edit"></i></span>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="edit{{ $bnt->id }}" tabindex="-1" aria-labelledby="editLabel{{ $bnt->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title m-auto" id="editLabel{{ $bnt->id }}">Edit Kriteria</h5>
                              </div>
                              <div class="modal-body">
                                <form action="/kriteria/{{ $bnt->id }}" method="post" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                  <label for="nama">Nama :</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $bnt->nama }}">
                                </div>
                                <div class="form-group">
                                  <label for="bobot">Bobot :</label>
                                  <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $bnt->bobot }}">
                                  <small class="form-text text-muted">Pengisian Bobot mulai dari 0-1</small>
                                </div>
                                <div class="form-group">
                                  <label for="kriteria">Jenis Kriteria : </label>
                                  <select class="form-control" id="kriteria" name="jns_kriteria">
                                      <option>-- Pilih Salah Satu</option>
                                      @foreach ($jenis as $jns)
                                        @if ($jns == $bnt->jenis_kriteria)
                                          <option selected value="{{ $jns }}">{{ $jns }}</option>    
                                        @else
                                          <option value="{{ $jns }}">{{ $jns }}</option>      
                                        @endif
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <span class="float-right badge badge-secondary">{{ $bnt->bobot }}</span>
                    </li>
                  @endforeach
                @endif
              </ul>
          </div>
      </div>
      <div class="col-md-6 mt-2">
          <div class="card shadow-sm">
              <div class="card-header bg-success text-white">
                <i class="fas fa-money-bill-wave-alt"></i>&nbsp;Cost
              </div>
              <ul class="list-group list-group-flush">
                @if ($cost->count() < 1)
                  <li class="list-group-item">Tidak Ada Cost</li>
                @else
                  @foreach ($cost as $cst)
                    <li class="list-group-item">
                        {{ $cst->nama }}
                        <form action="/kriteria/{{ $cst->id }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" style="border: none" class="float-right badge badge-danger ml-1"><i class="fas fa-trash"></i></button>
                        </form>
                        <span style="cursor: pointer" data-toggle="modal" data-target="#edit{{ $cst->id }}" href="" class="float-right badge badge-warning ml-1"><i class="fas fa-edit"></i></span>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="edit{{ $cst->id }}" tabindex="-1" aria-labelledby="editLabel{{ $cst->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title m-auto" id="editLabel{{ $cst->id }}">Edit Kriteria</h5>
                              </div>
                              <div class="modal-body">
                                <form action="/kriteria/{{ $cst->id }}" method="post" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                  <label for="nama">Nama :</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $cst->nama }}">
                                </div>
                                <div class="form-group">
                                  <label for="bobot">Bobot :</label>
                                  <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $cst->bobot }}">
                                  <small class="form-text text-muted">Pengisian Bobot mulai dari 0-1</small>
                                </div>
                                <div class="form-group">
                                  <label for="kriteria">Jenis Kriteria : </label>
                                  <select class="form-control" id="kriteria" name="jns_kriteria">
                                      <option>-- Pilih Salah Satu</option>
                                      @foreach ($jenis as $jns)
                                        @if ($jns == $cst->jenis_kriteria)
                                          <option selected value="{{ $jns }}">{{ $jns }}</option>    
                                        @else
                                          <option value="{{ $jns }}">{{ $jns }}</option>      
                                        @endif
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <span class="float-right badge badge-secondary">{{ $cst->bobot }}</span>
                    </li>
                  @endforeach
                @endif
              </ul>
          </div>
      </div>

      <div class="col-12">
        @if ($hasil == 1)
          <form action="/perhitungan" method="post">
            @csrf
            <button type="submit" class="btn btn-success mt-3">Lanjut &nbsp;<i class="fas fa-arrow-right"></i></button>
          </form>
        @elseif($hasil == null)
          <button class="btn btn-danger mt-3">
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>&nbsp;
            Nilai Sekarang = 0
          </button>
        @else
          <button class="btn btn-danger mt-3">
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>&nbsp;
            Nilai Sekarang = {{ $hasil }}
          </button>
        @endif
      </div>
    </div>
@endsection