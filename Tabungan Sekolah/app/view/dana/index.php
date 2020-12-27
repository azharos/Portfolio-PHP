<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $data["title"]; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <a href="<?= base_url ?>dana/setoran" class="btn btn-sm btn-primary">Setoran Awal</a>
                    <div class="btn btn-sm btn-success" data-toggle="modal" data-target="#tmbhsetoran">Tambah Setoran</div>
                    <a href="<?= base_url ?>dana/print" class="btn btn-sm btn-warning">Print</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <?= Session::flash(); ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Update Date</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data["tabungan"] as $tbg) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $tbg["nama_siswa"]; ?></td>
                                    <td><?= $tbg["kelas"]; ?></td>
                                    <td>Rp <?= number_format($tbg["saldo"], 0, ",", "."); ?></td>
                                    <td><?= $tbg["tanggal"] ?></td>
                                    <td>
                                        <div class="btn btn-sm btn-warning penarikan" data-nama="<?= $tbg['nama_siswa'] ?>" data-saldo="<?= $tbg['saldo'] ?>" data-toggle="modal" data-target="#penarikan" data-id="<?= $tbg["id"]; ?>"><i class="fas fa-exchange-alt"></i></div>
                                        <a href="<?= base_url ?>dana/delete/<?= $tbg['id'] ?>" class=" text-white btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php if (empty($data["tabungan"])) : ?>
                        Yukk Menabung Sekarang...
                    <?php endif ?>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Tambah Setoran Modal -->
<div class="modal fade" id="tmbhsetoran" tabindex="-1" aria-labelledby="tmbhsetoranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-auto" id="tmbhsetoranLabel">DATA TABUNGAN SISWA</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url ?>dana/addsaldo" method="post" autocomplete="off">
                    <input type="hidden" name="date" value="<?= date("d-m-Y") ?>">
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <select class="form-control" id="nama" name="nama">
                            <option selected>--- Pilih Siswa ---</option>
                            <?php foreach ($data["tabungan"] as $tbg) : ?>
                                <option class="siswa-select" data-id="<?= $tbg['id'] ?>" value="<?= $tbg["nama_siswa"] ?>"><?= $tbg["nama_siswa"] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="form-text text-muted" id="saldoskrng"></small>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Tambah Setoran</label>
                        <input type="text" class="form-control" id="saldo" name="saldo">
                        <?= Session::formError("saldo"); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addsetoran" class="btn btn-primary">Tambah Setoran</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Penarikan -->
<div class="modal fade" id="penarikan" tabindex="-1" aria-labelledby="penarikanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-auto" id="penarikanLabel">Penarikan Dana</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url ?>dana/penarikan" method="post" autocomplete="off">
                    <input type="hidden" name="id_penarikan" id="id_penarikan">
                    <div class="form-group">
                        <label for="nama_penarikan">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_penarikan" name="nama_penarikan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="saldo_penarikan">Saldo</label>
                        <input type="text" class="form-control" id="saldo_penarikan" name="saldo_penarikan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="penarikan">Penarikan</label>
                        <input type="text" class="form-control" id="penarikan" name="penarikan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tarik Dana</button>
                </form>
            </div>
        </div>
    </div>
</div>