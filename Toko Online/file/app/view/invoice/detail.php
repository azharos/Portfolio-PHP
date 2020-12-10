<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <img src="<?= base_url ?>assets/img/uploads/<?= $data['brg_inv']['gambar'] ?>" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <ul class="list-group mt-2">
                <li class="list-group-item">Kode Pembayaran : <?= $data['brg_inv']['kode_pembayaran'] ?></li>
                <li class="list-group-item">Nama Barang : <?= $data['brg_inv']['nama_brg'] ?></li>
                <li class="list-group-item">Kategori : <?= $data['brg_inv']['kategori'] ?></li>
                <li class="list-group-item">Harga : <?= number_format($data['brg_inv']['harga'], '0', '.', '.') ?></li>
                <li class="list-group-item">Keterangan : <?= $data['brg_inv']['keterangan'] ?></li>
                <a href="<?= base_url ?>invoice" class="btn btn-primary mt-2">Kembali</a>
            </ul>
        </div>
    </div>

</div>