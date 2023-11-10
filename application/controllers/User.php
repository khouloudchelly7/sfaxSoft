<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 *

  /**
 * Description of Task
 *
 * @author HP
 */

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();

        $this->load->model('UserModel');
        $this->load->model('TaskModel');
    }

    public function index() {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');

            if ($user->role == "administrateur") {
                $users = $this->UserModel->getUsers();
                $this->load->view('/user/listUser', ['users' => $users]);
            } else {
                $tasks = $this->TaskModel->getTasksUserId($user->id);
                $this->load->view('/task/listTask', ['tasks' => $tasks]);
            }
        } else {
            return redirect('auth');
        }
    }

    public function delete($id) {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            if ($user->role == "administrateur") {
                $this->UserModel->deleteuser($id);
                return redirect('user');
            }
            return redirect('task');
        } else {
            return redirect('auth');
        }
    }

    public function edit($id) {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');

            if ($user->role == "administrateur") {
                $userupdate = $this->UserModel->getUserById($id);
                $this->load->view('/user/updateUser', ['userupdate' => $userupdate]);
            } else {
                return redirect('task');
            }
        } else {
            return redirect('auth');
        }
    }

    public function update($id) {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            if ($user->role == "administrateur") {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
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
                    if ($this->UserModel->updateuser($id, $data)) {
                        $this->session->set_flashdata('response', 'User uptated successfully.');

                        redirect('user');
                    } else {
                        $this->session->set_flashdata('response', 'User Failled to update ');
                        $userupdate = $this->UserModel->getUserById($id);
                        $this->load->view('/user/updateUser', ['userupdate' => $userupdate]);
                    }
                } else {
                    $userupdate = $this->UserModel->getUserById($id);
                    $this->load->view('/user/updateUser', ['userupdate' => $userupdate]);
                }
            } else {
                redirect("task");
            }
        } else {
            redirect('auth');
        }
    }

}
