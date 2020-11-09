<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_modal");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("login/index");
    }

    public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->user_modal->loginid($username);

        if ($result > 0) {
            $login = [
                'login' => TRUE
            ];
            $this->session->set_userdata($login);
            redirect("home");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
