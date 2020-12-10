<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data["title"]; ?></h1>
    </div>

    <div class="row">
        <div class="col text-center">
            <h1 class="mb-3"><?= Session::formError("kode_pembayaran") ?></h1>
            <div class="alert alert-danger">
                SCREENSHOT dan SIMPAN KODE PEMBAYARAN SEBAGAI BUKTI PEMESANAN !!!
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center font-weight-bold">
            <p>Konfirmasi Pembayaran ke :</p>
            <a href="https://wa.me/6285641532396?text=Kode%20Pembayaran%20:%0ABukti%20Pembayaran%20:%0A%0A*KANG%20KONTER%20SHOP*" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            <a href="" class="btn btn-primary" target="_blank"><i class="fab fa-telegram"></i> Telegram</a>
        </div>
    </div>
</div>