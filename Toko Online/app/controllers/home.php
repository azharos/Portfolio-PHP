<?php

class Home extends Controller
{
    public function index()
    {
        $data["title"] = "Dashboard";
        $data["barang"] = $this->model("barang_m")->getAll();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar");
        $this->view("templates/topbar");
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }

    public function elektronik()
    {
        $data["title"] = "Elektronik";
        $data["elektronik"] = DB::resultAll("SELECT * FROM tb_barang WHERE kategori='elektronik'");

        $this->view("templates/header", $data);
        $this->view("templates/sidebar");
        $this->view("templates/topbar");
        $this->view("home/elektronik", $data);
        $this->view("templates/footer");
    }

    public function pakaian_pria()
    {
        $data["title"] = "Pakaian Pria";
        $data["p-pria"] = DB::resultAll("SELECT * FROM tb_barang WHERE kategori='Pakaian Pria'");

        $this->view("templates/header", $data);
        $this->view("templates/sidebar");
        $this->view("templates/topbar");
        $this->view("home/pakaian_pria", $data);
        $this->view("templates/footer");
    }
}
