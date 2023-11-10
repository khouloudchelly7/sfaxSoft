<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AuthModel
 *
 * @author HP
 */
class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function getUser($email) {

        // Requête pour récupérer l'utilisateur en fonction de l'adresse e-mail
        $query = $this->db->get_where('users', array('email' => $email));

        // Renvoyer la première ligne du résultat (l'utilisateur) 
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

}
