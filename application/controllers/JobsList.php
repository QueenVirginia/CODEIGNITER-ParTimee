<?php

class JobsList extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jobs_model');
        $this->load->library('form_validation');
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

    // public function detail($id_job)
    // {
    //     $data['jobs'] = $this->Jobs_model->getJobById($id_job);
    //     $this->load->view('jobs_list/detail', $data);
    // }

    public function detailJob($id_job)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Jobs_model->getJobsRow($id_job);

        $this->load->view('templates/header', $data);
        $this->load->view('jobs_list/detail', $data);
        $this->load->view('templates/footer');
    }
}
