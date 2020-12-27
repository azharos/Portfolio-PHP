<?php

class Admin extends Controller
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
        $data["title"] = "Dashboard";
        $data["jml_siswa"] = count(DB::resultAll("SELECT * FROM tb_siswa"));
        $data["jml_tbg"] = count(DB::resultAll("SELECT * FROM tb_tabungan"));
        $data["jml_saldo"] = DB::row("SELECT SUM(saldo) AS jsaldo FROM tb_tabungan");

        $this->view("template/header", $data);
        $this->view("template/navbar");
        $this->view("template/sidebar");
        $this->view("admin/index", $data);
        $this->view("template/footer");
    }
}
