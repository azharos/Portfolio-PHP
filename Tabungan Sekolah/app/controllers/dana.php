<?php

class Dana extends Controller
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
        $data["title"] = "Dana Tabungan";
        $data["tabungan"] = DB::resultAll("SELECT * FROM tb_tabungan");

        $this->view("template/header", $data);
        $this->view("template/navbar");
        $this->view("template/sidebar");
        $this->view("dana/index", $data);
        $this->view("template/footer");
    }

    public function setoran()
    {
        $data["title"] = "Setoran Awal";
        $data["siswa"] = DB::resultAll("SELECT * FROM tb_siswa ORDER BY id DESC");

        if (isset($_POST["simpan"])) {
            if ($this->model("dana_m")->tmbhsetor($_POST) == true) {
                Session::set_flash('<div class="alert alert-success mt-2" role="alert">Setor Sudah Ditambah</div>');
                header("Location:" . base_url . "dana");
                exit;
            } else {
                header("Location:" . base_url . "dana/setoran");
                exit;
            }
        }

        $this->view("template/header", $data);
        $this->view("template/navbar");
        $this->view("template/sidebar");
        $this->view("dana/setoran", $data);
        $this->view("template/footer");
    }

    public function ceksaldo()
    {
        $id = $_POST["id"];
        $row = DB::row("SELECT * FROM tb_tabungan WHERE id=$id");
        echo json_encode($row);
    }

    public function addsaldo()
    {
        if (isset($_POST["addsetoran"])) {
            if ($this->model("dana_m")->addSaldo($_POST) == true) {
                Session::set_flash('<div class="alert alert-success mt-2" role="alert">Saldo Berhasil Ditambah</div>');
                header("Location:" . base_url . "dana");
                exit;
            } else {
                header("Location:" . base_url . "dana");
                exit;
            }
        }
    }

    public function penarikan()
    {
        if (isset($_POST['penarikan'])) {

            $id = $_POST['id_penarikan'];
            $nama = $_POST['nama_penarikan'];
            $saldo = $_POST['saldo_penarikan'];
            $penarikan = $_POST['penarikan'];

            $saldo = $saldo - $penarikan;

            $update = "`saldo` = $saldo";
            DB::update('tb_tabungan', $update, 'id', $id);

            Session::set_flash('<div class="alert alert-success mt-2" role="alert">Penarikan Saldo Berhasil</div>');
            header('Location:' . base_url . 'dana');
            exit;
        }
    }
    public function print()
    {
        $data['tabungan'] = DB::resultAll('SELECT * FROM tb_tabungan');
        $this->view('dana/print', $data);
    }
}
