<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation', 'upload');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['count_user'] = $this->Admin_model->countDataUser();
        $data['count_jobs'] = $this->Admin_model->countDataJobs();
        $data['count_company'] = $this->Admin_model->countDataCompany();
        // $data['count_apply'] = $this->Admin_model->countDataApply();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_admin');
    }


    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/profile');
        $this->load->view('templates/footer_admin');
    }

    // =============================== USER ===============================
    public function user_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->Admin_model->getAllUser();

        $this->load->view('templates/header_admin', $data);
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->Admin_model->getUserById($id_user);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/detail_user', $data);
        $this->load->view('templates/footer_admin');
    }

    // =============================== JOB ===============================
    public function job_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Admin_model->getAllJobs();

        $this->load->view('templates/header_admin', $data);
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
        $this->form_validation->set_rules('logo', 'Logo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/add_job');
            $this->load->view('templates/footer_admin');
        } else {
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Admin_model->getJobById($id_job);

        $this->load->view('templates/header_admin', $data);
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

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/edit_job', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Admin_model->editDataJobs();
            $this->session->set_flashdata('flash', 'Changed');
            redirect('admin/job_list');
        }
    }

    // =============================== COMPANY ===============================
    public function company_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Admin_model->getAllCompany();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/company_table', $data);
        $this->load->view('templates/footer_admin');
    }


    public function add_company()
    {
        // $config['upload_path']         = './asset/company_logo/';  // folder upload 
        // $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        // $config['max_size']             = 1024;
        // $config['max_width']            = 700;
        // $config['max_height']           = 700;

        // $this->load->library('upload', $config);

        // if ( !$this->upload->do_upload('logo')) //sesuai dengan name pada form 
        // {
        //        echo 'anda gagal upload';
        // }
        // else
        // {
        //     //tampung data dari form
        //     $nama_company = $this->input->post('nama_company');
        //     $kantor_pusat = $this->input->post('kantor_pusat');
        //     $deskripsi = $this->input->post('deskripsi');
        //     $industri = $this->input->post('industri');
        //     $situs = $this->input->post('situs');
        //     $no_telepon = $this->input->post('no_telepon');
        //     $file= $this->upload->data();

        //     $logo = $file['file_name'];

        //     $this->admin_model->addDataCompany(array(
        //         'nama_company' => $nama_company,
        //         'kantor_pusat' => $kantor_pusat,
        //         'deskripsi' => $deskripsi,
        //         'industri' => $industri,
        //         'situs' => $situs,
        //         'no_telepon' => $no_telepon,
        //         'logo' => $logo

        //     ));
        //     $this->session->set_flashdata('flash','Added');
        //     redirect('admin/company_list');

        // }
        $this->form_validation->set_rules('nama_company', 'Company Name', 'required');
        $this->form_validation->set_rules('kantor_pusat', 'Office Base', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('industri', 'Industry', 'required');
        $this->form_validation->set_rules('situs', 'Site', 'required');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/add_company');
            $this->load->view('templates/footer_admin');
        } else {
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Admin_model->getCompanyById($id_company);

        $this->load->view('templates/header_admin', $data);
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

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/edit_company', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Admin_model->editDataCompany();
            $this->session->set_flashdata('flash', 'Changed');
            redirect('admin/company_list');
        }
    }

    // =============================== Apply ===============================
    public function apply_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['apply'] = $this->Admin_model->getAllDataApply();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/apply_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function detail_apply($id_apply)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['apply'] = $this->Admin_model->getApplyById($id_apply);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/detail_apply', $data);
        $this->load->view('templates/footer_admin');
    }
}
