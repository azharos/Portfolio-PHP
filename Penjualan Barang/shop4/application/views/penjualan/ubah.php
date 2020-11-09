<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Ubah Data Penjualan</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $p["faktur"] ?>">
                        <div class="form-group">
                            <label for="no">No Pelanggan :</label>
                            <input type="text" class="form-control" id="no" name="no" value="<?= $p["nopelanggan"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Penjualan :</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $p["tanggalpenjualan"] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>