<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_telepon' => $this->input->post('no_telepon'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'linkedin' => $this->input->post('linkedin'),
                'foto' => 'default.jpg',
                'cv' => 'default.pdf',
                'id_role' => 2,
                'tanggal_buat' => time(),
                'email' => $this->input->post('email')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Congratulation! your account has been created. Please Login!
          </div>');
            redirect('auth');
        }
    }
}
