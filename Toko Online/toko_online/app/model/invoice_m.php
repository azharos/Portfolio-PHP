<?php

class Invoice_m
{
    public function tmbhData($data)
    {
        $id_brg = $data["id_brg"];
        $kode_pembayaran = $data["kode_pembayaran"];
        $nama = htmlspecialchars($data["nama"]);
        $notelp = htmlspecialchars($data["notelp"]);
        $tambahan = htmlspecialchars($data["tambahan"]);

        date_default_timezone_set("Asia/Jakarta");
        $tgl_pesan = date("d-m-Y H:i:s");

        $query = "(NULL,'$id_brg','$kode_pembayaran','$nama','$notelp','$tambahan','$tgl_pesan')";
        DB::insert("tb_invoice", $query);
        return true;
    }

    public function formValidation($data, $type, $errors = null)
    {
        if (empty($data["nama"])) {
            Session::set_formError("nama", "Data Nama Wajib Diisi");
            $errors["nama"] = true;
        }

        if (empty($data["notelp"])) {
            Session::set_formError("notelp", "Data No.Telp Wajib Diisi");
            $errors["notelp"] = true;
        } else {
            if (!filter_var($data["notelp"], FILTER_VALIDATE_INT)) {
                Session::set_formError("notelp", "Data No.Telp Harus Berupa Angka");
                $errors["notelp"] = true;
            }
        }

        if ($errors == null) {
            if (strtolower($type) == "tambah") {
                return $this->tmbhData($data);
            } elseif (strtolower($type) == "ubah") {
                // return $this->ubahData($data);
            }
        } else {
            return false;
        }
    }
}
