<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        foreach ($data as $d) {
            $this->db->select('*');
            $this->db->from('apply');
            $this->db->join('jobs', 'jobs.id_job= apply.id_job');
            $this->db->join('company', 'company.id_company = jobs.id_company');
            $this->db->where('id_user', $d['id_user']);
            $this->db->order_by('id_apply', 'ASC');
            $query = $this->db->get()->result_array();
        }

        $data['apply'] = $query;

        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id_apply)
    {
        $this->db->select('*');
        $this->db->from('apply');
        $this->db->where('id_apply', $id_apply);
        $this->db->where('response', 1);
        $query = $this->db->get()->row_array();

        if ($query != NULL) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">You can not unmarked this job! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('profile');
        } else {
            $this->Profile_model->deleteDataApply($id_apply);

            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Success unmarked your job! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('profile');
        }
    }

    public function add_rating()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            $rating = $this->input->post('rating', true);
            $id_apply = $this->input->post('id_apply', true);
            $id_company = $this->input->post('id_company', true);

            $this->db->select('*');
            $this->db->from('apply');
            $this->db->where('id_apply', $id_apply);
            $this->db->where('response', 1);
            $query = $this->db->get()->result_array();

            if ($query != NULL) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Your Already Rate This Job!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );
                redirect('profile');
            } else {
                $this->db->set('id_company', $id_company);
                $this->db->set('rating', $rating);
                $this->db->set('response', 1);
                $this->db->where('id_apply', $id_apply);
                $this->db->update('apply');

                $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Success rate your jobs! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('profile');
            }
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            // Check Foto
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '20048'; //2MB
                $config['upload_path'] = './asset/profile_img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Success edit your profile! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('profile');
        }
    }
}
