<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>
    <!-- End Page Heading -->

    <div class="row mb-1">
        <div class="col-lg-5">
            <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Data Barang</button>
            <?php Session::flash() ?>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <!-- <th>Gambar</th> -->
            <th colspan="3" class="text-center">Aksi</th>
        </tr>

        <?php $no = 1;
        foreach ($data["barang"] as $brg) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $brg["nama_brg"]; ?></td>
                <td><?= $brg["keterangan"]; ?></td>
                <td><?= $brg["kategori"]; ?></td>
                <td class="text-right"><?= number_format($brg["harga"], '0', '.', '.'); ?></td>
                <td><?= $brg["stok"]; ?></td>
                <td class="text-center"><a class="btn btn-sm btn-success" href="<?= base_url ?>data_barang/detail/<?= $brg['id_brg'] ?>"><i class="fas fa-search-plus"></i></a></td>
                <td class="text-center"><a class="btn btn-sm btn-info" href="<?= base_url ?>data_barang/ubah/<?= $brg['id_brg'] ?>"><i class="fa fa-edit"></i></a></td>
                <td class="text-center"><a class="btn btn-sm btn-danger" href="<?= base_url ?>data_barang/hapus/<?= $brg['id_brg'] ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php endforeach ?>

    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="text-danger"><?php Session::formError("nama") ?></small>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                        <small class="text-danger"><?php Session::formError("keterangan") ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                        <small class="text-danger"><?php Session::formError("kategori") ?></small>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                        <small class="text-danger"><?php Session::formError("harga") ?></small>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok">
                        <small class="text-danger"><?php Session::formError("stok") ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <small class="text-danger"><?php Session::formError("gambar") ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>