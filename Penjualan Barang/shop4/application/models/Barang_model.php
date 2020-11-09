<?php

class Barang_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get("barang");
        return $query->result_array();
    }

    public function tambahdata()
    {
        $data = array(
            "namabarang" => $this->input->post("nama", true),
            "hargabarang" => $this->input->post("harga", true)
        );

        $this->db->insert('barang', $data);
    }

    public function detailData($id)
    {
        $query = $this->db->get_where("barang", ["kodebarang" => $id]);
        return $query->row_array();
    }

    public function hapusData($id)
    {
        $this->db->where('kodebarang', $id);
        $this->db->delete('barang');
    }

    public function ubahdata()
    {
        $data = array(
            "namabarang" => $this->input->post("nama", true),
            "hargabarang" => $this->input->post("harga", true)
        );

        $this->db->where('kodebarang', $this->input->post("id"));
        $this->db->update('barang', $data);
    }
}
