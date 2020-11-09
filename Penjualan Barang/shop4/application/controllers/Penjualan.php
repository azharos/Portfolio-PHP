<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Penjualan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Penjualan";
        $data["penjualan"] = $this->Penjualan_model->getAll();
        $this->load->view("template/header", $data);
        $this->load->view("penjualan/index", $data);
        $this->load->view("template/footer");
    }

    public function tambah()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Tambah Data Penjualan";

        $this->form_validation->set_rules("no", "No", "required|integer|max_length[6]");
        $this->form_validation->set_rules("tanggal", "Tanggal", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("penjualan/tambah", $data);
            $this->load->view("template/footer");
        } else {
            $this->Penjualan_model->tambahdata();
            redirect("penjualan");
        }
    }

    public function delete($id)
    {

        $this->Barang_model->hapusData($id);
        redirect("barang");
    }

    public function ubah($id)
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Ubah Data Penjualan";
        $data["p"] = $this->Penjualan_model->detailData($id);

        $this->form_validation->set_rules("no", "No", "required|integer");
        $this->form_validation->set_rules("tanggal", "Tanggal", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("penjualan/ubah", $data);
            $this->load->view("template/footer");
        } else {
            $this->Penjualan_model->ubahdata();
            redirect("penjualan");
        }
    }
}
