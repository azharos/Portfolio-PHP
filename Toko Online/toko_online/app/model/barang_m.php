<?php

class Barang_m
{
    public function getAll()
    {
        return DB::resultAll("SELECT * FROM tb_barang");
    }

    public function tmbhData($data)
    {
        $nama = htmlspecialchars($data["nama"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $stok = $data["stok"];
        $gambar = $this->upload();

        $query = "(NULL,'$nama','$keterangan','$kategori','$harga','$stok','$gambar')";
        DB::insert("tb_barang", $query);

        return true;
    }

    public function formValidation($data, $type, $errors = null)
    {

        if (empty($data["nama"])) {
            Session::set_formError("nama", "Data Nama Wajib Diisi");
            $errors["nama"] = true;
        }

        if (empty($data["keterangan"])) {
            Session::set_formError("keterangan", "Data Keterangan Wajib Diisi");
            $errors["keterangan"] = true;
        }

        if (empty($data["kategori"])) {
            Session::set_formError("kategori", "Data Kategori Wajib Diisi");
            $errors["kategori"] = true;
        }

        if (empty($data["harga"])) {
            Session::set_formError("harga", "Data Harga Wajib Diisi");
            $errors["harga"] = true;
        } else {
            if (!filter_var($data["harga"], FILTER_VALIDATE_INT)) {
                Session::set_formError("harga", "Data Harga Harus Berupa Angka");
                $errors["harga"] = true;
            }
        }

        if (empty($data["stok"])) {
            Session::set_formError("stok", "Data Stok Wajib Diisi");
            $errors["stok"] = true;
        } else {
            if (!filter_var($data["stok"], FILTER_VALIDATE_INT)) {
                Session::set_formError("stok", "Data Stok Harus Berupa Angka");
                $errors["stok"] = true;
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

    public function upload()
    {
        $nama = $_FILES["gambar"]["name"];
        $size = $_FILES["gambar"]["size"];
        $tmp = $_FILES["gambar"]["tmp_name"];


        // cek ekstensi
        $ekstensiGmbr = ["jpg", "jpeg", "png"];
        $ekstensi = explode(".", $nama);
        $ekstensi = strtolower(end($ekstensi));
        if (!in_array($ekstensi, $ekstensiGmbr)) {
            Session::set_formError("gambar", "File harus berupa gambar");
            return false;
        }

        // cek ukuran
        if ($size > 200000) {
            Session::set_formError("gambar", "Ukuran Maksimal 200kb");
            return false;
        }

        $nama_baru = uniqid() . "." . $ekstensi;

        // Tempat File
        move_uploaded_file($tmp, "./assets/img/uploads/" . $nama_baru);

        return $nama_baru;
    }

    public function getBrgById($id)
    {
        return DB::row("SELECT * FROM tb_barang WHERE id_brg = $id");
    }

    public function hapus($id)
    {
        $row = $this->getBrgById($id);;
        if (isset($row)) {
            unlink("./assets/img/uploads/" . $row["gambar"]);
        }
        DB::delete("tb_barang", "id_brg", $id);
    }

    public function ubahData($data)
    {

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $kategori = htmlspecialchars($data["kategori"]);
        $harga = $data["harga"];
        $stok = $data["stok"];
        $gambarlama = $data["gambar"];

        if ($_FILES["gambar"]["error"] === 4) {
            $gmbr = $gambarlama;
        } else {
            if (isset($gambarlama)) {
                unlink("./assets/img/uploads/" . $gambarlama);
            }
            $gmbr = $this->upload();
        }

        $query = "
            `nama_brg` = '$nama',
            `keterangan` = '$keterangan',
            `kategori` = '$kategori',
            `harga` = '$harga',
            `stok` = '$stok',
            `gambar` = '$gmbr'
        ";
        DB::update("tb_barang", $query, "id_brg", $id);

        return true;
    }
}
