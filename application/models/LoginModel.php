<?php

class LoginModel extends CI_Model {

    public function checkLogin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        return $query->num_rows();
    }

    public function getUserByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        return $query->row_array();
    }

}
