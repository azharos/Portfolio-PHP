<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h1>Data Pelanggan</h1>
            <a class="btn btn-primary mt-3" href="<?= base_url("pelanggan/tambah") ?>" role="button">Tambah Data Pelanggan</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($pelanggan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $p["namapelanggan"]; ?></td>
                            <td><?= $p["alamat"]; ?></td>
                            <td>
                                <a href="<?= base_url("pelanggan/ubah/$p[nopelanggan]") ?>" class="badge badge-primary">Ubah</a>
                                <a href="<?= base_url("pelanggan/delete/$p[nopelanggan]") ?>" class="badge badge-danger" onclick="return confirm('yakin ?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>