<?php

class Auth_m
{
    public function formValidation($data)
    {

        $user = $data["username"];
        $password = $data["password"];
        $row = DB::row("SELECT * FROM tb_user WHERE username='$user'");

        if (count($row) > 0) {
            if (password_verify($password, $row["password"])) {
                Session::set_data("login", true);
                header("Location:" . base_url . "admin");
                exit;
            } else {
                Session::set_flash("<div class='alert alert-danger'>Password Salah</div>");
                header("Location:" . base_url . "auth");
                exit;
            }
        } else {
            Session::set_flash("<div class='alert alert-danger'>Username Salah</div>");
            header("Location:" . base_url . "auth");
            exit;
        }
    }
}
