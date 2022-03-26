<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile($id_user)
    {
        $data['user'] = $this->Profile_model->getUserById($id_user);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
            'valid_email' => 'This email not valid!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Profile_model->editProfile();

            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Success edit your profile! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('profile');
        }
    }
}
