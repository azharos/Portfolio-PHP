<?php

class User_modal extends CI_Model
{
    public function loginid($data)
    {
        $query = $this->db->get_where("admin", ["username" => $data]);
        return $query->num_rows();
    }
}
