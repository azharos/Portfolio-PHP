<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row mb-3">
        <?php foreach ($data["elektronik"] as $eltr) : ?>
            <div class="col-lg-3 text-center mt-4 col-md-6">
                <div class="card">
                    <img src="<?= base_url ?>assets/img/uploads/<?= $eltr["gambar"] ?>" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $eltr["nama_brg"]; ?></h5>
                        <p class="card-text mb-1"><?= $eltr["keterangan"]; ?></p>
                        <span class="badge badge-success mb-2">Rp. <?= number_format($eltr["harga"], '0', '.', '.') ?></span>
                        <br>
                        <a href="<?= base_url ?>invoice/pembayaran/<?= $eltr["id_brg"] ?>" class="btn btn-primary">Beli</a>
                        <a href="" class="btn btn-success">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>