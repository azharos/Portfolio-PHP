<?php

class Pelanggan_model extends CI_Model
{
    public function tambahdata()
    {
        $data = array(
            "namapelanggan" => $this->input->post("nama", true),
            "alamat" => $this->input->post("alamat", true)
        );

        $this->db->insert('pelanggan', $data);
    }

    public function getAll()
    {
        $query = $this->db->get("pelanggan");
        return $query->result_array();
    }

    public function detaildata($id)
    {
        $query = $this->db->get_where("pelanggan", ["nopelanggan" => $id]);
        return $query->row_array();
    }

    public function ubahdata()
    {
        $data = array(
            "namapelanggan" => $this->input->post("nama", true),
            "alamat" => $this->input->post("alamat", true)
        );

        $this->db->where('nopelanggan', $this->input->post("id"));
        $this->db->update('pelanggan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('nopelanggan', $id);
        $this->db->delete('pelanggan');
    }
}
