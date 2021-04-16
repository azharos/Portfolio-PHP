<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $data["title"]; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-lg-5">
                    <div class="btn btn-primary btn-sm " data-toggle="modal" data-target="#tmbh">
                        <i class="fas fa-plus"></i> Tambah
                    </div>
                </div>
                <div class="col-lg-7">
                    <form class="form-inline float-right" action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control mx-sm-3" id="cari" placeholder="Cari Nama Siswa" name="keyword">
                        </div>
                        <button type="submit" class="btn btn-primary" name="cari">Cari</button>
                    </form>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-5">
                    <?= Session::flash() ?>
                </div>
            </div>

            <div class="table-responsive mb-3">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data["siswa"] as $s) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $s["nama"]; ?></td>
                                <td><?= $s["kelas"]; ?></td>
                                <td><?= $s["alamat"]; ?></td>
                                <td><?= $s["nohp"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $s['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit<?= $s['id'] ?>" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahLabel">Edit Siswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url ?>siswa/edit" method="POST" autocomplete="off">
                                                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $s["nama"] ?>">
                                                            <?= Session::formError("nama") ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pndk">Pendidikan</label>
                                                            <select class="form-control" id="pndk" name="pndk">
                                                                <option>-- Masukan Pendidikan --</option>
                                                                <?php foreach ($data["kelas_s"] as $kls2_s) : ?>
                                                                    <?php if ($kls2_s["kelas"] == $s["kelas"]) : ?>
                                                                        <option selected value="<?= $s["kelas"] ?>"><?= $s["kelas"]; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $kls2_s["kelas"] ?>"><?= $kls2_s["kelas"]; ?></option>
                                                                    <?php endif ?>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $s["alamat"] ?>">
                                                            <?= Session::formError("alamat") ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nohp">No HP</label>
                                                            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Gunakan 62..." value="<?= $s["nohp"] ?>">
                                                            <?= Session::formError("nohp") ?>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url ?>siswa/hapus/<?= $s['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if (empty($data["siswa"])) : ?>
                    <h3>Data Siswa Kosong</h3>
                <?php endif ?>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal Tambah -->
<div class="modal fade" id="tmbh" tabindex="-1" aria-labelledby="tmbhLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tmbhLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= Session::formError("nama") ?>
                    </div>
                    <div class="form-group">
                        <label for="pndk">Pendidikan</label>
                        <select class="form-control" id="pndk" name="pndk">
                            <option selected>-- Masukan Pendidikan --</option>
                            <?php foreach ($data["kelas"] as $kls) : ?>
                                <option value="<?= $kls["pendidikan"] . ' - Kelas ' . $kls["kelas"] ?>"><?= $kls["pendidikan"] . ' - Kelas ' . $kls["kelas"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                        <?= Session::formError("alamat") ?>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Gunakan 62...">
                        <?= Session::formError("nohp") ?>
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