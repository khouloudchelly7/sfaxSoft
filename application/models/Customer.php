<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Customer extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCustomer() {
        $query = $this->db->get('customers');

        return $query->result();
    }

    public function saveRecord($data) {
        return $this->db->insert('customers', $data);
    }

    public function deleteRecord($id) {
        return $this->db->delete('customers', array('id' => $id));
    }

    public function getRecoredById($id) {
        $query = $this->db->get_where('customers', array('id' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function updateRecord($id, $data) {
        return $this->db->where('id', $id)->update('customers', $data);
    }

}
