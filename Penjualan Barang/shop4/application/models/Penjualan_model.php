<?php

class Penjualan_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get("penjualan");
        return $query->result_array();
    }

    public function tambahdata()
    {
        $data = array(
            "nopelanggan" => $this->input->post("no", true),
            "tanggalpenjualan" => $this->input->post("tanggal", true)
        );

        $this->db->insert('penjualan', $data);
    }

    public function detailData($id)
    {
        $query = $this->db->get_where("penjualan", ["faktur" => $id]);
        return $query->row_array();
    }

    public function delete($id)
    {
        $this->db->where('faktur', $id);
        $this->db->delete('penjualan');
    }

    public function ubahdata()
    {
        $data = array(
            "nopelanggan" => $this->input->post("no", true),
            "tanggalpenjualan" => $this->input->post("tanggal", true)
        );

        $this->db->where('faktur', $this->input->post("id"));
        $this->db->update('penjualan', $data);
    }
}
