<?php

class Siswa_m
{
    public function formValidation($data, $type, $errors = null)
    {
        if (empty($data["nama"])) {
            $errors["nama"] = true;
            Session::set_formError("nama", '<small class="text-danger">Wajib diisi</small>');
        }

        if (empty($data["alamat"])) {
            $errors["alamat"] = true;
            Session::set_formError("alamat", '<small class="text-danger">Wajib diisi</small>');
        }

        if (empty($data["nohp"])) {
            $errors["nohp"] = true;
            Session::set_formError("nohp", '<small class="text-danger">Wajib diisi</small>');
        } else {
            if (!filter_var($data["nohp"], FILTER_VALIDATE_INT)) {
                $errors["nohp"] = true;
                Session::set_formError("nohp", '<small class="text-danger">Harus Berupa Nomor</small>');
            } else {
                if (strlen($data["nohp"]) >= 15) {
                    $errors["nohp"] = true;
                    Session::set_formError("nohp", '<small class="text-danger">Nomor Lebih dari 13</small>');
                }
            }
        }

        if ($errors == null) {
            if (strtolower($type) == "tambah") {
                return $this->tmbhData($data);
            } elseif (strtolower($type) == "ubah") {
                return $this->ubahData($data);
            }
        } else {
            return false;
        }
    }

    public function tmbhData($data)
    {
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $pndk = $data["pndk"];
        $nohp = $data["nohp"];

        $kelas2 = DB::row("SELECT * FROM tb_kelas2 WHERE kelas='$pndk'");

        $query1 = "(NULL,'$nama','$pndk','$alamat','$nohp')";
        $query2 = "(NULL,'$pndk')";

        if (count($kelas2) == null) {
            DB::insert("tb_kelas2", $query2);
        }

        DB::insert("tb_siswa", $query1);

        return true;
    }

    public function ubahData($data)
    {
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $pndk = $data["pndk"];
        $nohp = $data["nohp"];

        $update = "
        `nama` = '$nama',
        `kelas` = '$pndk',
        `alamat` = '$alamat',
        `nohp` = '$nohp'";
        DB::update("tb_siswa", $update, 'id', $id);
        return true;
    }

    public function search($data)
    {
        $keyword = $data["keyword"];
        $query = "SELECT * FROM tb_siswa WHERE nama LIKE '%$keyword%' ORDER BY id DESC";
        return DB::resultAll($query);
    }
}
