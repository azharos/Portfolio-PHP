<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
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
                <div class="col-md-6 mb-2">
                    <div class="btn btn-primary mb-2" data-toggle="modal" data-target="#tmbh">Tambah Kelas</div>
                    <?= Session::flash() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data["kelas"] as $kls) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $kls["pendidikan"]; ?></td>
                                    <td><?= $kls["kelas"]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $kls['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?= $kls['id'] ?>" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahLabel">Ubah Kelas</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url ?>kelas/ubah" method="POST">
                                                            <input type="hidden" name="id" value="<?= $kls['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="kelas">Kelas</label>
                                                                <input type="text" class="form-control" id="kelas" placeholder="Masukkan Nama Kelas" name="kelas" value="<?= $kls['kelas'] ?>">
                                                                <?= Session::formError("kelas") ?>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?= base_url ?>kelas/hapus/<?= $kls['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php if (empty($data["kelas"])) : ?>
                        <h3>Data Kelas Kosong</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah -->
<div class="modal fade" id="tmbh" tabindex="-1" aria-labelledby="tmbhLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tmbhLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-control" id="pendidikan" name="pendidikan">
                            <option>-- Masukan Pendidikan --</option>
                            <?php foreach ($data["pendidikan"] as $pndk) : ?>
                                <option value="<?= $pndk ?>"><?= $pndk ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" placeholder="Contoh : TK B, 1, 10" name="kelas">
                        <?= Session::formError("kelas") ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>