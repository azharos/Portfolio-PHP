<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <h1>Data Barang</h1>

            <a class="btn btn-primary mt-3" href="<?= base_url("barang/tambah") ?>" role="button">Tambah Data Barang</a>

            <ul class="list-group mt-3">
                <?php foreach ($barang as $brg) : ?>
                    <li class="list-group-item">
                        <?= $brg["namabarang"]; ?>
                        <a href="<?= base_url() ?>barang/hapus/<?= $brg["kodebarang"] ?>" class="badge badge-danger float-right" onclick="return confirm('yakin ?')">Hapus</a>
                        <a href="<?= base_url() ?>barang/detail/<?= $brg["kodebarang"] ?>" class="badge badge-primary mr-2 float-right">Detail</a>
                        <a href="<?= base_url() ?>barang/ubah/<?= $brg["kodebarang"] ?>" class="badge badge-success mr-2 float-right">Ubah</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>