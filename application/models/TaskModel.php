<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class TaskModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getUsersByRole($role) {
        $this->db->where('role', $role);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function saveTask($data) {

        return $this->db->insert("tasks", $data);
    }

    public function getTasksAdmin() {


        $this->db->select('tasks.*, users.userName , users.role');
        $this->db->from('tasks');
        $this->db->join('users', 'users.id = tasks.createdBy', 'inner'); 
        $query = $this->db->get(); 
        return $query->result();
    }

    public function getTasksUserId($id) {

        $this->db->select('tasks.*, users.userName , users.role');
        $this->db->from('tasks');
        $this->db->join('users', 'users.id = tasks.createdBy', 'inner'); 
        $this->db->where("user_id", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function modifierEtat($id) {
        $this->db->where("user_id", $id);
        $query = $this->db->get('tasks');
        return $query->result();
    }

    public function updateEtat($id, $data) {


        return $this->db->where('id', $id)->update('tasks', ['etat' => $data]);
    }

    public function deleteTask($id) {
        return $this->db->delete('tasks', array('id' => $id));
    }

    public function updateTask($id, $data) {
        return $this->db->where('id', $id)->update('tasks', $data);
    }

    public function getTaskById($id) {

        $this->db->select('tasks.*, users.userName ,users.role');
        $this->db->from('tasks');
        $this->db->join('users', 'users.id = tasks.user_id', 'inner');
        $this->db->where('tasks.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

}
