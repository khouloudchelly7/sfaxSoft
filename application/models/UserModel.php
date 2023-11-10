<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserModel
 *
 * @author HP
 */
class UserModel extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getUsers() {
        $query = $this->db->get('users');

        return $query->result();
    }

    public function deleteuser($id) {
        return $this->db->delete('users', array('id' => $id));
    }
  public function getUserById($id)
  {
      
        $query = $this->db->get_where('users', array('id' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
  }
    public function updateuser($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }
  
}
