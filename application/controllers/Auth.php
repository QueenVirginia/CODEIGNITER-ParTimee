<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('jobslist');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'id_role' => $user['id_role']
                ];

                $this->session->set_userdata($data);
                if ($user['id_role'] == 1) {
                    redirect('admin');
                } else {
                    redirect('jobslist');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang Anda masukkan salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email ini belum terdaftar! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('jobslist');
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',

        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => '  Password tidak sama!',
            'min_length' => 'Password terlalu pendek! minimal panjang password 8'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'foto' => 'default.jpeg',
                'id_role' => 2,
                'tanggal_buat' => time(),
                'email' => htmlspecialchars($this->input->post('email', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Hore! akun Anda berhasil dibuat. Silahkan Login!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Logout!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
