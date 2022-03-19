<?php 

class Register extends CI_Controller {

    public function index() 
    {
        $this->load->view('templates/header_log');
        $this->load->view('login_register/register');
        $this->load->view('templates/footer');
    }
}