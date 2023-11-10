<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Task
 *
 * @author HP
 */
class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('TaskModel');
    }

    public function index() {
        if ($this->session->userdata('user')) {


            $user = $this->session->userdata('user');

            if ($user->role == "administrateur") {
                $tasks = $this->TaskModel->getTasksAdmin();
            } else {

                $tasks = $this->TaskModel->getTasksUserId($user->id);
            }
            $this->load->view('/task/listTask', ['tasks' => $tasks]);
        } else {
            return redirect('auth');
        }
    }

    public function addTask() {
        if ($this->session->userdata('user')) {


            $user = $this->session->userdata('user');

            if ($user->role == "administrateur") {
                $this->load->view('/task/addTask');
            } else {
                return redirect('task');
            }
        } else {
            return redirect('auth');
        }
    }

    public function getUsersByRole() {

        $user = $this->session->userdata('user');
        $selectedRole = $this->input->get('role');
        $users = $this->TaskModel->getUsersByRole($selectedRole);

        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function save() {

        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');

            if ($user->role == "administrateur") {


                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('user_id', 'Name', 'required');
                $this->form_validation->set_rules('validation', 'Date', 'required|date');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run()) {
                    $createdBy = $user->id;
                    $data = array(
                        "user_id" => $this->input->post('user_id'),
                        "date_validation" => $this->input->post('validation'),
                        "description" => $this->input->post('description'),
                        "createdBy" => $createdBy,
                        "etat" => false,
                    );

                    if ($this->TaskModel->saveTask($data)) {
                        $this->session->set_flashdata('response', 'Task added successfully.');
                        return redirect('task');
                    } else {
                        $this->session->set_flashdata('response', 'Task Failled to save ');
                        $this->load->view('task/addTask');
                    }
                } else {
                    $this->load->view('/task/addTask');
                }
            } else {
                return redirect('task');
            }
        } else {
            return redirect('auth');
        }
    }

    public function updateTaskStatus() {

        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            $taskID = $this->input->post('taskID');
            $isChecked = $this->input->post('isChecked');

            if ($isChecked == 'true') {
                $isChecked = true;
            } else {
                $isChecked = false;
            }
            $this->TaskModel->updateEtat($taskID, $isChecked);
        } else {
            return redirect('auth');
        }
    }

    public function delete($id) {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            if ($user->role == "administrateur") {
                $this->TaskModel->deleteTask($id);
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
                $task = $this->TaskModel->getTaskById($id);
                $this->load->view('/task/updateTask', ['task' => $task]);
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

                $this->form_validation->set_rules('roles', 'Role', 'required');
                $this->form_validation->set_rules('user_id', 'Name', 'required');
                $this->form_validation->set_rules('validation', 'Date', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run()) {

                    $data = array(
                        "user_id" => $this->input->post('user_id'),
                        "date_validation" => $this->input->post('validation'),
                        "description" => $this->input->post('description'),
                    );
                    if ($this->TaskModel->updateTask($id, $data)) {
                        $this->session->set_flashdata('response', 'Task uptated successfully.');

                        return redirect('task');
                    } else {
                       $this->session->set_flashdata('response', 'Task Failled to update ');
                    $task = $this->TaskModel->getTaskById($id);
                    $this->load->view('/task/updateTask', ['task' => $task]);
                    }
                } else {
                    $task = $this->TaskModel->getTaskById($id);

                    $this->load->view('/task/updateTask', ['task' => $task]);
                }
            } else {
                return redirect('task');
            }
        } else {
            return redirect('auth');
        }
    }

}
