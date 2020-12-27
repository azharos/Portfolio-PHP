<?php

class Siswa extends Controller
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
        $data["title"] = "Siswa";
        $data["siswa"] = DB::resultAll("SELECT * FROM tb_siswa ORDER BY id DESC");
        $data["kelas"] = DB::resultAll("SELECT * FROM tb_kelas");
        $data["kelas_s"] = DB::resultAll("SELECT kelas FROM tb_kelas2");

        // Cari
        if (isset($_POST["cari"])) {
            $data["siswa"] = $this->model("siswa_m")->search($_POST);
        }

        if (isset($_POST["tambah"])) {
            if ($this->model("siswa_m")->formValidation($_POST, "tambah") == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
                header("Location:" . base_url . "siswa");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Ditambah</div>');
                header("Location:" . base_url . "siswa");
                exit;
            }
        }

        $this->view("template/header", $data);
        $this->view("template/navbar");
        $this->view("template/sidebar");
        $this->view("siswa/index", $data);
        $this->view("template/footer");
    }

    public function edit()
    {
        if (isset($_POST["edit"])) {
            if ($this->model("siswa_m")->formValidation($_POST, "ubah") == true) {
                Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                header("Location:" . base_url . "siswa");
                exit;
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Gagal Diubah</div>');
                header("Location:" . base_url . "siswa");
                exit;
            }
        }
    }

    public function hapus($id)
    {
        $row = DB::row("SELECT kelas FROM tb_siswa WHERE id=$id");
        $kelas = DB::resultAll("SELECT kelas FROM tb_siswa WHERE kelas='$row[kelas]'");
        if (count($kelas) == 1) {
            $kls = $kelas[0]['kelas'];
            $id_kls2 = DB::row("SELECT id FROM tb_kelas2 WHERE kelas='$kls'");

            DB::delete("tb_kelas2", "id", $id_kls2['id']);
            DB::delete("tb_siswa", "id", $id);

            Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
            header("Location:" . base_url . "siswa");
            exit;
        } else {
            DB::delete("tb_siswa", "id", $id);
            Session::set_flash('<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
            header("Location:" . base_url . "siswa");
            exit;
        }
    }
}
