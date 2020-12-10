<?php

class Data_barang extends Controller
{
    public function __construct()
    {
        if (!Session::data("login")) {
            header("Location:" . base_url . "auth");
            exit;
        }
    }

    public function index()
    {
        $data["title"] = "Data Barang";
        $data["barang"] = $this->model("barang_m")->getAll();

        if (isset($_POST["tambah"])) {
            if ($this->model("barang_m")->formValidation($_POST, "TAMBAH") == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
                header("Location:" . base_url . "data_barang");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Ditambah</div>');
                header("Location:" . base_url . "data_barang");
                exit;
            }
        }

        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("databarang/index", $data);
        $this->view("templates/footer");
    }

    public function hapus($id)
    {
        $this->model("barang_m")->hapus($id);
        Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        header("Location:" . base_url . "data_barang");
        exit;
    }

    public function ubah($id)
    {
        if (isset($_POST["ubah"])) {
            if ($this->model("barang_m")->formValidation($_POST, "ubah") == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                header("Location:" . base_url . "data_barang");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Diubah</div>');
                header("Location:" . base_url . "data_barang/ubah/$id");
                exit;
            }
        }

        $data["barang"] = $this->model("barang_m")->getBrgById($id);
        $data["title"] = "Ubah Data Barang";
        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("databarang/ubah", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["barang"] = $this->model("barang_m")->getBrgById($id);
        $data["title"] = "Detail Data Barang";
        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("databarang/detail", $data);
        $this->view("templates/footer");
    }
}
