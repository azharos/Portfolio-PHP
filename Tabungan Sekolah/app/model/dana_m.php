<?php

class Dana_m
{
    public function tmbhsetor($data, $errors = null)
    {
        $id = $data["id"];
        $nama = $data["nama"];
        $kelas = $data["kelas"];
        $tgl = $data["tgl"];
        $setor = $data["setor"];

        if (empty($nama)) {
            Session::set_formError("nama", "<small class='text-danger'>Wajib Diisi</small>");
            $errors["nama"] = true;
        }

        if (empty($kelas)) {
            Session::set_formError("kelas", "<small class='text-danger'>Wajib Diisi</small>");
            $errors["kelas"] = true;
        }

        if (empty($setor)) {
            Session::set_formError("setor", "<small class='text-danger'>Wajib Diisi</small>");
            $errors["setor"] = true;
        } else {
            if (!filter_var($setor, FILTER_VALIDATE_INT)) {
                Session::set_formError("setor", "<small class='text-danger'>Harus Berupa Angka</small>");
                $errors["setor"] = true;
            }
        }

        if ($errors == null) {

            $tb_tbg = DB::row("SELECT * FROM tb_tabungan WHERE id_siswa=$id");
            if ($tb_tbg) {
                Session::set_flash('<div class="alert alert-danger" role="alert">Data Sudah Ada</div>');
                return false;
            } else {
                $query = "(NULL,'$id','$nama','$kelas','$tgl','$setor')";
                DB::insert("tb_tabungan", $query);
            }
            return true;
        } else {
            Session::set_flash('<div class="alert alert-danger" role="alert">Setor Gagal Ditambah</div>');
            return false;
        }
    }

    public function addSaldo($data, $errors = null)
    {
        $date = $data["date"];
        $nama = $data["nama"];
        $saldo = $data["saldo"];

        if (empty($saldo)) {
            Session::set_formError("saldo", "<small class='text-danger'>Wajib Diisi</small>");
            $errors["saldo"] = true;
        } else {
            if (!filter_var($saldo, FILTER_VALIDATE_INT)) {
                Session::set_formError("saldo", "<small class='text-danger'>Harus Berupa Angka</small>");
                $errors["saldo"] = true;
            }
        }

        if ($errors == null) {
            $row = DB::row("SELECT * FROM tb_tabungan WHERE nama_siswa='$nama'");

            $saldo = $saldo + $row["saldo"];

            $update = "
                `tanggal` = '$date',
                `saldo` = $saldo
            ";
            DB::update("tb_tabungan", $update, "id", $row["id"]);

            return true;
        } else {
            Session::set_flash('<div class="alert alert-danger mt-2" role="alert">Tambah Setoran Gagal</div>');
            return false;
        }
    }
}
