<?php

class Model_auth extends CI_Model
{
    public function cek_login()
    {
        $username   = set_value('email');
        $password   = set_value('password');

        $result     = $this->db->where('email', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_users');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
