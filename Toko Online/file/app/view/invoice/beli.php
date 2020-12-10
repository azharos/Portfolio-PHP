<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row mb-4">
        <div class="col-lg-6 mb-2">
            <div class="media">
                <img src="<?= base_url ?>assets/img/uploads/<?= $data["brg"]["gambar"] ?>" class="mr-3" alt="..." width="130">
                <div class="media-body">
                    <h5><?= $data["brg"]["nama_brg"]; ?></h5>
                    <h6>Harga : Rp <?= number_format($data["brg"]["harga"], '0', '.', '.'); ?></h6>
                    <h6>Kategori : <?= $data["brg"]["kategori"]; ?></h6>
                    <h6>Keterangan : <?= $data["brg"]["keterangan"]; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-6 border-left">
            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="id_brg" value="<?= $data["brg"]["id_brg"] ?>">
                <input type="hidden" name="kode_pembayaran" value="<?= 'KK' . date("dmy") . '' . urlencode(base64_encode(random_bytes(3))) ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <small class="text-danger"><?= Session::formError("nama") ?></small>
                </div>
                <div class="form-group">
                    <label for="notelp">No Telepon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp">
                    <small class="text-danger"><?= Session::formError("notelp") ?></small>
                </div>
                <div class="form-group">
                    <label for="tambahan">Tambahan <small>(jika ada)</small></label>
                    <textarea name="tambahan" id="tambahan" class="form-control" placeholder="Contoh : Pengiriman JNE dan Pembayaran BNI (nomor rekening)"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="pesan">Pesan</button>
                <a href="<?= base_url ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>

</div>