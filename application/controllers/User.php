<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->Admin_model->getAllUser();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/user_table');
        $this->load->view('templates/footer_admin');
    }

    // public function jj()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // }
}
