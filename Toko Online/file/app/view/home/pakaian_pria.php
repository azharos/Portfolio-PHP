<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row mb-3">
        <?php foreach ($data["p-pria"] as $p) : ?>
            <div class="col-lg-3 text-center mt-4 col-md-6">
                <div class="card">
                    <img src="<?= base_url ?>assets/img/uploads/<?= $p["gambar"] ?>" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $p["nama_brg"]; ?></h5>
                        <p class="card-text mb-1"><?= $p["keterangan"]; ?></p>
                        <span class="badge badge-success mb-2">Rp. <?= number_format($p["harga"], '0', '.', '.') ?></span>
                        <br>
                        <a href="<?= base_url ?>invoice/pembayaran/<?= $p["id_brg"] ?>" class="btn btn-primary">Beli</a>
                        <a href="" class="btn btn-success">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>