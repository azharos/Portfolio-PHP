<?php

class Kelas_m
{
    public function tmbhdata($data, $errors = null)
    {
        if (empty($data["kelas"])) {
            $errors["kelas"] = true;
            Session::set_formError("kelas", '<small class="text-danger">Wajib diisi</small>');
        }

        if ($errors == null) {
            $kelas = $data["kelas"];
            $pndk = $data["pendidikan"];

            $query = "(NULL,'$kelas','$pndk')";
            DB::insert("tb_kelas", $query);
            return true;
        } else {
            return false;
        }
    }

    public function getAll()
    {
        return DB::resultAll("SELECT * FROM tb_kelas ORDER BY id DESC");
    }

    public function ubahdata($data, $errors = null)
    {
        if (empty($data["kelas"])) {
            $errors["kelas"] = true;
            Session::set_formError("kelas", '<small class="text-danger">Wajib diisi</small>');
        }

        if ($errors == null) {
            $kelas = $data["kelas"];
            $id = $data["id"];

            $update = "
            `kelas` = '$kelas'
            ";
            DB::update("tb_kelas", $update, 'id', $id);
            return true;
        } else {
            return false;
        }
    }

    public function getpendidikan()
    {
        $pndidikan = ["TK", "SD", "SMP", "SMK", "KULIAH"];
        return $pndidikan;
    }
}
