<?php 

class AboutUs extends CI_Controller {

    public function index() 
    {
        $this->load->view('templates/header');
        $this->load->view('aboutus/index');
        $this->load->view('templates/footer');
    }
}