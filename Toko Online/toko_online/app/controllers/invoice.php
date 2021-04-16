<?php

class Invoice extends Controller
{
    public function index()
    {
        $data["title"] = "Penjualan";
        $data["invoice"] = DB::resultAll("SELECT * FROM tb_invoice ORDER BY id DESC");

        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("invoice/index", $data);
        $this->view("templates/footer");
    }

    public function pembayaran($id)
    {
        $data["title"] = "Pembayaran";
        $data["brg"] = DB::row("SELECT * FROM tb_barang WHERE id_brg=$id");

        if (isset($_POST["pesan"])) {
            if ($this->model("invoice_m")->formValidation($_POST, "tambah") == true) {
                Session::set_formError("kode_pembayaran", $_POST["kode_pembayaran"]);
                header("Location:" . base_url . "invoice/kode_pembayaran");
                exit;
            }
        }

        $this->view("templates/header", $data);
        $this->view("templates/sidebar");
        $this->view("templates/topbar");
        $this->view("invoice/beli", $data);
        $this->view("templates/footer");
    }

    public function kode_pembayaran()
    {
        $data["title"] = "Kode Pembayaran";
        $this->view("templates/header", $data);
        $this->view("templates/sidebar");
        $this->view("templates/topbar");
        $this->view("invoice/kode", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["title"] = "Detail Penjualan";
        $data["brg_inv"] = DB::row("SELECT * FROM `tb_barang` INNER JOIN `tb_invoice`
        ON `tb_barang`.`id_brg` = `tb_invoice`.`id_brg`
        WHERE `tb_invoice`.`id` = $id");

        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("invoice/detail", $data);
        $this->view("templates/footer");
    }

    public function hapus($id)
    {
        DB::delete("tb_invoice", 'id', $id);
        header("Location:" . base_url . "invoice");
    }
}
