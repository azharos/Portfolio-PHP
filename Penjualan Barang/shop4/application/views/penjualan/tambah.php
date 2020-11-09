<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <a href="<?= base_url("penjualan/tambah") ?>" class="btn btn-outline-dark" role="button" aria-pressed="true">Refresh</a>
            <div class="card mt-3">
                <h5 class="card-header">Tambah Data Penjualan</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <abel for="no">No Pelanggan :</abel>
                            <input type="text" class="form-control" id="no" name="no">
                            <small style="color: red;"><?php echo form_error('no'); ?></small>
                        </div>
                        <div class="form-group">
                            <abel for="tanggal">Tanggal Penjualan :</abel>
                            <input type="text" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>