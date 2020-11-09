<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h1>Data Penjualan</h1>
            <a class="btn btn-primary mt-3" href="<?= base_url("penjualan/tambah") ?>" role="button">Tambah Data Pelanggan</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Pelanggan</th>
                        <th scope="col">Tanggal Penjualan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($penjualan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $p["nopelanggan"]; ?></td>
                            <td><?= $p["tanggalpenjualan"]; ?></td>
                            <td>
                                <a href="<?= base_url("penjualan/ubah/$p[faktur]") ?>" class="badge badge-primary">Ubah</a>
                                <a href="<?= base_url("penjualan/delete/$p[faktur]") ?>" class="badge badge-danger" onclick="return confirm('yakin ?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>