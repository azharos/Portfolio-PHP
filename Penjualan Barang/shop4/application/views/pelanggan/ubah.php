<div class="container">
    <div class="row mt-5">
        <div class="col-8">
            <h1>Ubah Data Pelanggan</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $pelanggan["nopelanggan"] ?>">
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" value="<?= $pelanggan["namapelanggan"] ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $pelanggan["alamat"] ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
            </form>
        </div>
    </div>
</div>