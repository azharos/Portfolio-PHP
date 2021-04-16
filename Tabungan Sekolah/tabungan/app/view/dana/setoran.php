<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark mb-1"><?= $data["title"]; ?></h1>
                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#carisiswa">Cari Siswa</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 mb-2">
                    <?= Session::flash(); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <form action="" method="post" autocomplete="off">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                            <?= Session::formError("nama"); ?>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" readonly>
                            <?= Session::formError("kelas"); ?>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="text" class="form-control" id="tgl" name="tgl" value="<?= date('d-m-Y') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="setor">Setoran Awal</label>
                            <input type="text" class="form-control" id="setor" name="setor">
                            <?= Session::formError("setor"); ?>
                        </div>
                        <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        <a href="<?= base_url ?>dana" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="carisiswa" tabindex="-1" aria-labelledby="carisiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-auto" id="carisiswaLabel">Pilih Siswa</h5>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data["siswa"] as $s) : ?>
                            <tr class="tr" data-id="<?= $s['id'] ?>" data-nama="<?= $s["nama"]; ?>" data-kelas="<?= $s["kelas"]; ?>">
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $s["nama"]; ?></td>
                                <td><?= $s["kelas"]; ?></td>
                                <td><?= $s["nohp"]; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>