<?php

class Admin extends Controller
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
        $data["title"] = "Dashboard";
        $data["jml_brg"] = count(DB::resultAll("SELECT * FROM tb_barang"));
        $data["jml_invoice"] = count(DB::resultAll("SELECT * FROM tb_invoice"));

        $this->view("templates/header_admin", $data);
        $this->view("templates/sidebar_admin");
        $this->view("templates/topbar_admin");
        $this->view("admin/index", $data);
        $this->view("templates/footer");
    }
}
