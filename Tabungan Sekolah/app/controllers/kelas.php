<?php

class Kelas extends Controller
{
    public function __construct()
    {
        if (!Session::data('login')) {
            header("Location:" . base_url);
            exit;
        }
    }

    public function index()
    {
        $data["title"] = "Kelas";
        $data["kelas"] = $this->model("kelas_m")->getAll();
        $data["pendidikan"] = $this->model("kelas_m")->getpendidikan();

        if (isset($_POST["tambah"])) {
            if ($this->model("kelas_m")->tmbhdata($_POST) == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
                header("Location:" . base_url . "kelas");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Ditambah</div>');
                header("Location:" . base_url . "kelas");
                exit;
            }
        }

        $this->view("template/header", $data);
        $this->view("template/navbar");
        $this->view("template/sidebar");
        $this->view("kelas/index", $data);
        $this->view("template/footer");
    }

    public function ubah()
    {
        if (isset($_POST["ubah"])) {
            if ($this->model("kelas_m")->ubahdata($_POST) == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                header("Location:" . base_url . "kelas");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Diubah</div>');
                header("Location:" . base_url . "kelas");
                exit;
            }
        }
    }

    public function hapus($id)
    {
        DB::delete("tb_kelas", "id", $id);
        Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        header("Location:" . base_url . "kelas");
        exit;
    }
}
