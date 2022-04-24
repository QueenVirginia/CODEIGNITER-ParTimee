<?php

class JobsList extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jobs_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Jobs_model->getAllJobs();

        if ($this->input->post('cari_kerja')) {
            $data['jobs'] = $this->Jobs_model->searchJob();
        }

        $data['count'] = $this->Jobs_model->countData();
        $this->load->view('templates/header', $data);
        $this->load->view('jobs_list/index', $data);
        $this->load->view('templates/footer');
    }

    public function detailJob($id_job)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Jobs_model->getJobsRow($id_job);

        if ($this->input->post('addApply', true)) {
            $id_user = $this->input->post('id_user');
            $id_job = $this->input->post('id_job');

            $this->db->select('*');
            $this->db->from('apply');
            $this->db->where('id_user', $id_user);
            $this->db->where('id_job', $id_job);
            $query = $this->db->get()->row_array();

            if ($query != NULL) {
                $this->session->set_flashdata(
                    'msg_apply',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                This Job Already Marked! Go To <u>Profile</u> to See Your Job.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );
            } else {
                $this->db->set('id_user', $id_user);
                $this->db->set('id_job', $id_job);
                $this->db->insert('apply');

                $this->session->set_flashdata(
                    'msg_apply',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Success! You Marked This Job.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('jobs_list/detail', $data);
        $this->load->view('templates/footer');
    }
}
