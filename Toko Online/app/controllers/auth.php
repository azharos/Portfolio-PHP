<?php

class Auth extends Controller
{
    public function index()
    {
        if (Session::data("login")) {
            header("Location:" . base_url . "admin");
            exit;
        }

        $this->view("auth/index");
        if (isset($_POST["login"])) {
            if ($this->model("auth_m")->formValidation($_POST) == true) {
                header("Location:" . base_url . "admin");
                exit;
            } else {
                header("Location:" . base_url . "auth");
                exit;
            }
        }
    }

    public function logout()
    {
        Session::unset_data("login");
        header("Location:" . base_url);
        exit;
    }
}
