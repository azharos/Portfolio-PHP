<!-- Begin Page Content -->
<div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url ?>assets/img/slider/slider1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url ?>assets/img/slider/slider2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">

        <?php foreach ($data["barang"] as $brg) : ?>
            <div class="col-lg-3 text-center mt-4 col-md-6">
                <div class="card">
                    <img src="<?= base_url ?>assets/img/uploads/<?= $brg["gambar"] ?>" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $brg["nama_brg"]; ?></h5>
                        <p class="card-text mb-1"><?= $brg["keterangan"]; ?></p>
                        <span class="badge badge-success mb-2">Rp. <?= number_format($brg["harga"], '0', '.', '.') ?></span>
                        <br>
                        <a href="<?= base_url ?>invoice/pembayaran/<?= $brg["id_brg"] ?>" class="btn btn-primary">Beli</a>
                        <a href="" class="btn btn-success">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>
<!-- /.container-fluid -->