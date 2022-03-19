<?php 

class Admin extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['count_user'] = $this->Admin_model->countDataUser();
        $data['count_jobs'] = $this->Admin_model->countDataJobs();
        $data['count_company'] = $this->Admin_model->countDataCompany();
        // $data['count_apply'] = $this->Admin_model->countDataApply();
        $this->load->view('templates/header_admin');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_admin');
    }

    // =============================== USER ===============================
    public function user_list()
    {
        $data['user'] = $this->Admin_model->getAllUser();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/user_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function delete_user($id_user) 
    {
        $this->Admin_model->deleteDataUser($id_user);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/user_list');  
    }

    public function detail_user($id_user)
    {
        $data['user'] = $this->Admin_model->getUserById($id_user);
        $this->load->view('templates/header_admin');
        $this->load->view('admin/detail_user', $data);
        $this->load->view('templates/footer_admin');
    }

    // =============================== JOB ===============================
    public function job_list()
    {
        $data['jobs'] = $this->Admin_model->getAllJobs();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/jobs_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_job()
    {
        $this->form_validation->set_rules('nama_job', 'Job Name', 'required');
        $this->form_validation->set_rules('lokasi', 'Location', 'required');
        $this->form_validation->set_rules('batasan', 'Status', 'required');
        $this->form_validation->set_rules('tipe_kerja', 'Job Type', 'required');
        $this->form_validation->set_rules('deskripsi_job', 'Description', 'required');
        $this->form_validation->set_rules('benefit_job', 'Benefit', 'required');
        $this->form_validation->set_rules('link_apply', 'Apply Link', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/add_job');
            $this->load->view('templates/footer_admin');
        } 
        else 
        {
            $this->Admin_model->addDataJobs();
            $this->session->set_flashdata('flash', 'Added');
            redirect('admin/job_list');  
        }
    }

    public function delete_job($id_job) 
    {
        $this->Admin_model->deleteDataJobs($id_job);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/job_list');  
    }

    public function detail_job($id_job)
    {
        $data['jobs'] = $this->Admin_model->getJobById($id_job);
        $this->load->view('templates/header_admin');
        $this->load->view('admin/detail_job', $data);
        $this->load->view('templates/footer_admin');
    }

    public function edit_job($id_job)
    {
        $data['jobs'] = $this->Admin_model->getJobById($id_job);
        $data['tipe_kerja'] = ['Remote', 'Hybrid', 'On-Site'];

        $this->form_validation->set_rules('nama_job', 'Job Name', 'required');
        $this->form_validation->set_rules('lokasi', 'Location', 'required');
        $this->form_validation->set_rules('batasan', 'Status', 'required');
        $this->form_validation->set_rules('deskripsi_job', 'Description', 'required');
        $this->form_validation->set_rules('benefit_job', 'Benefit', 'required'); 
        $this->form_validation->set_rules('link_apply', 'Apply Link', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/edit_job', $data);
            $this->load->view('templates/footer_admin');
        } 
        else 
        {
            $this->Admin_model->editDataJobs();
            $this->session->set_flashdata('flash', 'Changed');
            redirect('admin/job_list');  
        }
    }

    // =============================== COMPANY ===============================
    public function company_list()
    {
        $data['company'] = $this->Admin_model->getAllCompany();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/company_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_company()
    {
        $this->form_validation->set_rules('nama_company', 'Company Name', 'required');
        $this->form_validation->set_rules('kantor_pusat', 'Office Base', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('industri', 'Industry', 'required');
        $this->form_validation->set_rules('situs', 'Site', 'required');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');
        // $this->form_validation->set_rules('logo', 'Logo', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/add_company');
            $this->load->view('templates/footer_admin');
        } 
        else 
        {
            $this->Admin_model->addDataCompany();
            $this->session->set_flashdata('flash', 'Added');
            redirect('admin/company_list');  
        }
    }

    public function delete_company($id_company) 
    {
        $this->Admin_model->deleteDataCompany($id_company);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/company_List');  
    }

    public function detail_company($id_company)
    {
        $data['company'] = $this->Admin_model->getCompanyById($id_company);
        $this->load->view('templates/header_admin');
        $this->load->view('admin/detail_company', $data);
        $this->load->view('templates/footer_admin');
    }

    public function edit_company($id_company)
    {
        $data['company'] = $this->Admin_model->getCompanyById($id_company);
        // $data['industri'] = ['Remote', 'Hybrid', 'On-Site'];

        $this->form_validation->set_rules('nama_company', 'Company Name', 'required');
        $this->form_validation->set_rules('kantor_pusat', 'Office Base', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('industri', 'Industry', 'required');
        $this->form_validation->set_rules('situs', 'Site', 'required');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');
        // $this->form_validation->set_rules('logo', 'Logo', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header_admin');
            $this->load->view('admin/edit_company', $data);
            $this->load->view('templates/footer_admin');
        } 
        else 
        {
            $this->Admin_model->editDataCompany();
            $this->session->set_flashdata('flash', 'Changed');
            redirect('admin/company_list');  
        }
    }

    // =============================== Apply ===============================
    public function apply_list()
    {
        $data['apply'] = $this->Admin_model->getAllDataApply();

        $this->load->view('templates/header_admin');
        $this->load->view('admin/apply_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function detail_apply($id_apply)
    {
        $data['apply'] = $this->Admin_model->getApplyById($id_apply);
        $this->load->view('templates/header_admin');
        $this->load->view('admin/detail_apply', $data);
        $this->load->view('templates/footer_admin');
    }
}