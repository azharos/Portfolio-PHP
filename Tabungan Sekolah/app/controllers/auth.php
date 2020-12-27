<?php

class Auth extends Controller
{
    public function index()
    {
        if (Session::data('login')) {
            header("Location:" . base_url . 'admin');
            exit;
        }
        $this->view('auth/index');
    }

    public function login()
    {
        if (Session::data('login')) {
            header("Location:" . base_url . 'admin');
            exit;
        }

        if (isset($_POST['login'])) {
            $username = $_POST['user'];

            $user = DB::row("SELECT * FROM tb_user WHERE username='$username'");

            if (count($user) > 0) {

                if (password_verify($_POST['pass'], $user['password'])) {

                    Session::set_data("login", true);

                    Session::set_flash('<div class="alert alert-success" role="alert">Login Berhasil</div>');
                    header('Location:' . base_url . 'admin');
                    exit;
                } else {
                    Session::set_flash('<div class="alert alert-danger" role="alert">Password Salah</div>');
                    header('Location:' . base_url . 'auth/login');
                    exit;
                }
            } else {
                Session::set_flash('<div class="alert alert-danger" role="alert">Username Salah</div>');
                header('Location:' . base_url . 'auth/login');
                exit;
            }
        }

        $this->view('auth/login');
    }

    public function logout()
    {
        if (!Session::data('login')) {
            header("Location:" . base_url);
            exit;
        }

        Session::destroy_data('login');
        header("Location:" . base_url);
        exit;
    }
}
