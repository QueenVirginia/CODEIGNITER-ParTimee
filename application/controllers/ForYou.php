<?php

class ForYou extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->library('form_validation');
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['company'] = $this->Company_model->getAllCompany();

        if ($this->input->post('cari_company')) {
            $data['company'] = $this->Company_model->searchCompany();
        }

        $this->load->view('foryou/index', $data);

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
    }

    public function detail($id_company)
    {
        $data['company'] = $this->Company_model->getCompanyById($id_company);
        $this->load->view('foryou/detail_company', $data);
    }

    // public function index()
    // {
    //     $data['jobs'] = $this->Jobs_model->getAllJobs();

    //     if( $this->input->post('keyword') ) {
    //         $data['jobs'] = $this->Jobs_model->cariDataJobs();
    //     }

    //     $this->load->view('templates/header');
    //     $this->load->view('foryou/index', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tambah()
    // {
    //     $data['judul'] = "Form Tambah Data Jobs";

    //     $this->form_validation->set_rules('nama_job', 'Nama Job', 'required');
    //     $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
    //     if ($this->form_validation->run() == FALSE) 
    //     {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('foryou/tambah');
    //         $this->load->view('templates/footer');
    //     } 
    //     else 
    //     {
    //         $this->Jobs_model->tambahDataJobs();
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('foryou');  
    //     }
    // }

    // public function hapus($id_job) 
    // {
    //     $this->Jobs_model->hapusDataJobs($id_job);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     redirect('foryou');  
    // }

    // public function detail($id_job)
    // {
    //     $data['judul'] = 'Detail Mahasiswa';
    //     $data['jobs'] = $this->Jobs_model->getJobById($id_job);
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('foryou/detail', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function ubah($id_job)
    // {
    //     $data['judul'] = "Form Ubah Data Jobs";
    //     $data['jobs'] = $this->Jobs_model->getJobById($id_job);   
    //     $data['lokasi'] = ['Jakarta', 'Bandung', 'Bekasi'];

    //     $this->form_validation->set_rules('nama_job', 'Nama Job', 'required');
    //     $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');

    //     if ($this->form_validation->run() == FALSE) 
    //     {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('foryou/ubah', $data);
    //         $this->load->view('templates/footer');
    //     } 
    //     else 
    //     {
    //         $this->Jobs_model->ubahDataJobs();
    //         $this->session->set_flashdata('flash', 'Diubah');
    //         redirect('foryou');  
    //     }
    // }

}
