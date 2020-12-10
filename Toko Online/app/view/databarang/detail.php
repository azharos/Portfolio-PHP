<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>
    <!-- End Page Heading -->

    <div class="row">
        <div class="col-lg-6">
            <table class="table">
                <tr>
                    <th>Nama Barang</th>
                    <td><?= $data["barang"]["nama_brg"]; ?></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><?= $data["barang"]["keterangan"]; ?></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td><?= $data["barang"]["kategori"]; ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><?= $data["barang"]["harga"]; ?></td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td><?= $data["barang"]["stok"]; ?></td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td>
                        <img src="<?= base_url . 'assets/img/uploads/' . $data["barang"]["gambar"] ?>" width="120">
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>