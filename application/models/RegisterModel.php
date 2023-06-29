<?php

class RegisterModel extends CI_Model{
    public function add_user($data){
        return $this->db->insert('users', $data);
    }
}
