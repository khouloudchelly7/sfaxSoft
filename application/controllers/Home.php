<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
    }

    public function index() {

        $customers = $this->Customer->getCustomer();
        //   var_dump($customers);die;
        // Load a view to display the products
        $this->load->view('home', ['customers' => $customers]);
        //	$this->load->view('home');
    }

    //create
    public function create() {
        $this->load->view('create');
    }

    public function update($id) {
        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phome', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            if ($this->Customer->updateRecord($id, $data)) {
                $this->session->set_flashdata('response', 'Record uptated successfully.');
            } else {
                $this->session->set_flashdata('response', 'Record Failled to update ');
            }
        } else {
            //echo validation_errors();
            //   $this->load->view('update');
        }
        return redirect('home');
    }

    //save
    public function save() {
        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phome', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if ($this->form_validation->run()) {
            // echo 'Success' ;
            $data = $this->input->post();

            if ($this->Customer->saveRecord($data)) {
                $this->session->set_flashdata('response', 'Record saved successfully.');

                //   $this->index();
            } else {
                $this->session->set_flashdata('response', 'Record Failled to save ');

                //	$this->load->view('create');
            }
            return redirect('home');
        } else {
            //echo validation_errors();
            $this->load->view('create');
        }
    }

    //edit
    public function edit($id) {
        $customer = $this->Customer->getRecoredById($id);
        $this->load->view('update', ["customer" => $customer]);

    }

    //delete
    public function delete($id) {
        if ($this->Customer->deleteRecord($id)) {
            $this->session->set_flashdata('response', 'Record deleted successfully.');
        } else {
            $this->session->set_flashdata('response', 'Record Failled to delete ');
        }

        return redirect('home');
    }

}
