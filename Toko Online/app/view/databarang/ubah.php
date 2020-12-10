<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php Session::flash() ?>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="id" value="<?= $data["barang"]["id_brg"] ?>">
                <input type="hidden" name="gambar" value="<?= $data["barang"]["gambar"] ?>">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["barang"]["nama_brg"] ?>">
                    <small class="text-danger"><?php Session::formError("nama") ?></small>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data["barang"]["keterangan"] ?>">
                    <small class="text-danger"><?php Session::formError("keterangan") ?></small>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $data["barang"]["kategori"] ?>">
                    <small class="text-danger"><?php Session::formError("kategori") ?></small>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $data["barang"]["harga"] ?>">
                    <small class="text-danger"><?php Session::formError("harga") ?></small>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $data["barang"]["stok"] ?>">
                    <small class="text-danger"><?php Session::formError("stok") ?></small>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Produk</label><br>
                    <img src="<?= base_url . 'assets/img/uploads/' . $data["barang"]["gambar"] ?>" alt="" width="120">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <small class="text-danger"><?php Session::formError("gambar") ?></small>
                </div>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
                <a href="<?= base_url . "data_barang" ?>" class="btn btn-info">Kembali</a>
            </form>
        </div>
    </div>

</div>