<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Ubah Data Barang</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $barang["kodebarang"] ?>">
                        <div class="form-group">
                            <abel for="nama">Nama Barang :</abel>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang["namabarang"] ?>">
                        </div>
                        <div class="form-group">
                            <abel for="harga">Harga Barang :</abel>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang["hargabarang"] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>