<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Barang";
        $data["barang"] = $this->Barang_model->getAll();
        $this->load->view("template/header", $data);
        $this->load->view("barang/index", $data);
        $this->load->view("template/footer");
    }

    public function tambah()
    {
        $data["judul"] = "Tambah Data Barang";

        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("harga", "Harga", "required|integer");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("barang/tambah");
            $this->load->view("template/footer");
        } else {
            $this->Barang_model->tambahdata();
            redirect("barang");
        }
    }

    public function detail($id)
    {
        $data["judul"] = "Detail Barang";
        $data["barang"] = $this->Barang_model->detailData($id);
        $this->load->view("template/header", $data);
        $this->load->view("barang/detail", $data);
        $this->load->view("template/footer");
    }

    public function hapus($id)
    {
        $this->Barang_model->hapusData($id);
        redirect("barang");
    }

    public function ubah($id)
    {
        $data["judul"] = "Ubah Data Barang";
        $data["barang"] = $this->Barang_model->detailData($id);

        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("harga", "Harga", "required|integer");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("barang/ubah");
            $this->load->view("template/footer");
        } else {
            $this->Barang_model->ubahdata();
            redirect("barang");
        }
    }
}
