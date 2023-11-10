<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
        session_start();
    }

    public function index() {
        if ($this->session->userdata('user')) {
            return redirect('task');
        } else {
            $this->load->view('login');
        }
    }

    public function register() {

        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            if ($user->role == "administrateur") {

                $this->load->view('user/register');
            } else {
                return redirect('task');
            }
        } else {
            return redirect('user');
        }
    }

    public function login() {
        if ($this->session->userdata('user')) {
            return redirect('task');
        } else {
            // Définir les délimiteurs d'erreur pour les messages de validation

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            // Définir les règles de validation pour les champs email et password

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
            // Vérifier si la validation du formulaire a réussi

            if ($this->form_validation->run()) {
                // Récupérer le mot de passe depuis le formulaire

                $password = $this->input->post('password');
                // Récupérer l'utilisateur en fonction de l'adresse e-mail
                $email = $this->input->post('email');
                $user = $this->AuthModel->getUser($email);
                // Vérifier si le mot de passe fourni correspond à celui stocké dans la base de données

                if (password_verify($password, $user->password)) {
                    // Authentification réussie, enregistrer l'utilisateur dans la session

                    $this->session->set_userdata('user', $user);
                    redirect('Task/index');
                } else {
                    redirect('Auth');
                }
            } else {
                // Afficher la vue de connexion avec les messages de validation

                redirect('Auth');
            }
        }
    }

    public function logout() {


        if ($this->session->userdata('user')) {
            $this->session->unset_userdata('user');

            $this->session->sess_destroy();
        }

        redirect('auth');
    }

    public function saveUser() {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            if ($user->role == "administrateur") {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('userName', 'Your Name', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
                $this->form_validation->set_rules('conf_password', 'Repeat Password', 'required|min_length[4]|matches[password]');
                $this->form_validation->set_rules('roles', 'Role', 'required');
                $password = $this->input->post('password');
                $conf_password = $this->input->post('conf_password');
                $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

                if ($this->form_validation->run()) {

                    $data = array(
                        "userName" => $this->input->post('userName'),
                        "email" => $this->input->post('email'),
                        "password" => $encrypted_password,
                        "role" => $this->input->post('roles'),
                    );
                    if ($this->AuthModel->register_user($data)) {
                        $this->session->set_flashdata('response', 'user added successfully.');
                        redirect('user');
                    } else {
                        $this->session->set_flashdata('response', 'user Failled to save ');
                        $this->load->view('user/register');
                    }
                } else {
                    $this->load->view('user/register');
                }
            } else {
                redirect("task");
            }
        } else {
            redirect('auth');
        }
    }

}
