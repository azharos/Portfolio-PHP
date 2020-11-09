<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('login') != true) {
            redirect("login");
        }
        $data["judul"] = "Home";
        $this->load->view("template/header", $data);
        $this->load->view("home/index");
        $this->load->view("template/footer");
    }
}
