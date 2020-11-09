<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pelanggan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Pelanggan";
        $data["pelanggan"] = $this->Pelanggan_model->getAll();
        $this->load->view("template/header", $data);
        $this->load->view("pelanggan/index", $data);
        $this->load->view("template/footer");
    }

    public function tambah()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Tambah Data Pelanggan";

        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("pelanggan/tambah");
            $this->load->view("template/footer");
        } else {
            $this->Pelanggan_model->tambahdata();
            redirect("pelanggan");
        }
    }

    public function ubah($id)
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Ubah Data Pelanggan";
        $data["pelanggan"] = $this->Pelanggan_model->detailData($id);

        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/header", $data);
            $this->load->view("pelanggan/ubah", $data);
            $this->load->view("template/footer");
        } else {
            $this->Pelanggan_model->ubahdata();
            redirect("pelanggan");
        }
    }

    public function delete($id)
    {
        $this->Pelanggan_model->hapusData($id);
        redirect("pelanggan");
    }
}
