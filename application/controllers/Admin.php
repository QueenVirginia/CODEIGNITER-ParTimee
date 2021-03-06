<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        check_role_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['count_user'] = $this->Admin_model->countDataUser();
        $data['count_jobs'] = $this->Admin_model->countDataJobs();
        $data['count_company'] = $this->Admin_model->countDataCompany();
        $data['count_apply'] = $this->Admin_model->countDataApply();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer_admin');
    }

    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            $upload_image = $_FILES['foto']['name'];
            // var_dump($upload_image);
            // die;

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

            $this->session->set_flashdata('flash', 'diubah');
            redirect('admin/profile');
        }
    }

    // =============================== USER ===============================
    public function user_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->Admin_model->getAllUser();

        if ($this->input->post('cari_user')) {
            $data['user_data'] = $this->Admin_model->searchUser();
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/user_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function delete_user($id_user)
    {
        $this->Admin_model->deleteDataUser($id_user);
        $this->session->set_flashdata('flash', 'dihapus');

        redirect('admin/user_list');
    }

    // =============================== JOB ===============================
    public function job_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jobs'] = $this->Admin_model->getAllJobs();

        if ($this->input->post('cari_job')) {
            $data['jobs'] = $this->Admin_model->searchJobs();
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/jobs_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_job()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Admin_model->getAllCompany();

        $this->form_validation->set_rules('nama_job', 'Job Name', 'required');
        $this->form_validation->set_rules('lokasi', 'Location', 'required');
        $this->form_validation->set_rules('batasan', 'Status', 'required');
        $this->form_validation->set_rules('tipe_kerja', 'Job Type', 'required');
        $this->form_validation->set_rules('deskripsi_job', 'Description', 'required');
        $this->form_validation->set_rules('benefit_job', 'Benefit', 'required');
        $this->form_validation->set_rules('link_apply', 'Apply Link', 'required');
        $this->form_validation->set_rules('nama_company', 'Nama Company', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/add_job', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $nama_job = $this->input->post('nama_job', true);
            $lokasi = $this->input->post('lokasi', true);
            $batasan = $this->input->post('batasan', true);
            $tipe_kerja = $this->input->post('tipe_kerja', true);
            $deskripsi_job = $this->input->post('deskripsi_job', true);
            $benefit_job = $this->input->post('benefit_job', true);
            $link_apply = $this->input->post('link_apply', true);
            $id_company = $this->input->post('nama_company', true);

            if ($id_company) {
                $this->db->select('id_company');
                $this->db->where('nama_company', $id_company);
                $query = $this->db->get('company')->row_array();

                $this->db->set('id_company', $query['id_company']);
            }

            $this->db->set('nama_job', $nama_job);
            $this->db->set('lokasi', $lokasi);
            $this->db->set('batasan', $batasan);
            $this->db->set('tipe_kerja', $tipe_kerja);
            $this->db->set('deskripsi_job', $deskripsi_job);
            $this->db->set('benefit_job', $benefit_job);
            $this->db->set('link_apply', $link_apply);
            $this->db->insert('jobs');

            // $this->Admin_model->addDataJobs($query);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admin/job_list');
        }
    }

    public function delete_job($id_job)
    {
        $this->Admin_model->deleteDataJobs($id_job);
        $this->session->set_flashdata('flash', 'dihapus');
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
            $this->session->set_flashdata('flash', 'diubah');
            redirect('admin/job_list');
        }
    }

    // =============================== COMPANY ===============================
    public function company_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Admin_model->getAllCompany();

        if ($this->input->post('cari_company')) {
            $data['company'] = $this->Admin_model->searchCompany();
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/company_table', $data);
        $this->load->view('templates/footer_admin');
    }


    public function add_company()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_company', 'Company Name', 'required');
        $this->form_validation->set_rules('kantor_pusat', 'Office Base', 'required');
        $this->form_validation->set_rules('industri', 'Industry', 'required');
        $this->form_validation->set_rules('situs', 'Site', 'required');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/add_company', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $nama_company = $this->input->post('nama_company', true);
            $kantor_pusat = $this->input->post('kantor_pusat', true);
            $industri = $this->input->post('industri', true);
            $situs = $this->input->post('situs', true);
            $no_telepon = $this->input->post('no_telepon', true);
            $deskripsi = $this->input->post('deskripsi', true);

            $upload_image = $_FILES['logo']['name'];
            // var_dump($upload_image);
            // die;

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '20048'; //2MB
                $config['upload_path'] = './asset/company_img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('logo', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_company', $nama_company);
            $this->db->set('kantor_pusat', $kantor_pusat);
            $this->db->set('industri', $industri);
            $this->db->set('situs', $situs);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->insert('company');

            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admin/company_list');
        }
    }

    public function delete_company($id_company)
    {
        $this->Admin_model->deleteDataCompany($id_company);
        $this->session->set_flashdata('flash', 'dihapus');
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

        $this->form_validation->set_rules('nama_company', 'Company Name', 'required');
        $this->form_validation->set_rules('kantor_pusat', 'Office Base', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('industri', 'Industry', 'required');
        $this->form_validation->set_rules('situs', 'Site', 'required');
        $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/edit_company', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Admin_model->editDataCompany();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('admin/company_list');
        }
    }

    // =============================== Apply ===============================
    public function apply_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['apply'] = $this->Admin_model->getAllDataApply();

        if ($this->input->post('cari_apply')) {
            $data['apply'] = $this->Admin_model->searchApply();
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/apply_table', $data);
        $this->load->view('templates/footer_admin');
    }

    public function delete_apply($id_apply)
    {
        $this->Admin_model->deleteDataApply($id_apply);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('admin/apply_list');
    }

    public function detail_apply($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->Admin_model->getUserById($id_user);

        $this->db->select('apply.id_user, user.id_user');
        $this->db->from('apply');
        $this->db->join('user', 'user.id_user = apply.id_user');
        $this->db->where('user.id_user', $id_user);
        $this->db->where('apply.response', 1);
        $check_user = $this->db->get()->result_array();

        if ($check_user != NULL) {
            $this->db->select('user.nama, company.nama_company, company.kantor_pusat, user.nama, apply.rating as apply_rating');
            $this->db->from('apply');
            $this->db->join('company', 'company.id_company= apply.id_company');
            $this->db->join('user', 'user.id_user= apply.id_user');
            $this->db->where('apply.response', 1);
            $algos = $this->db->get()->result_array();

            // Select nama user yang menampilkan nama_company dan rating
            foreach ($algos as $alg) {
                $matrix[$alg['nama']][$alg['nama_company']] = $alg['apply_rating'];
            }

            // Ambil nama user sesuai id
            $this->db->select('nama');
            $this->db->from('user');
            $this->db->where('id_user', $id_user);
            $nama_user = $this->db->get()->row_array();

            // Ubah Array menjadi String
            $new_nama = implode(" ", $nama_user);

            $data['reco'] = $this->getRecommendations($matrix, $new_nama);
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/detail_apply', $data);
        $this->load->view('templates/footer_admin');
    }

    private function similarity_distance($matrix, $person1, $person2)
    {
        $similar = array();
        $sum = 0;

        foreach ($matrix[$person1] as $key => $value) {
            if (array_key_exists($key, $matrix[$person2])) {
                $similar[$key] = 1;
            }
        }

        if ($similar == 0) {
            return 0;
        }

        // Eucalidean Distance
        foreach ($matrix[$person1] as $key => $value) {
            if (array_key_exists($key, $matrix[$person2])) {
                $sum = $sum + pow($value - $matrix[$person2][$key], 2);
            }
        }

        // Normalisasi
        return 1 / (1 + sqrt($sum));
    }

    private function getRecommendations($matrix, $person)
    {
        $total = array();
        $simsum = array();
        $ranks = array();

        foreach ($matrix as $otherPerson => $value) {
            if ($otherPerson != $person) {
                $sim = $this->similarity_distance($matrix, $person, $otherPerson);

                // Weighted Sum
                foreach ($matrix[$otherPerson] as $key => $value) {
                    if (!array_key_exists($key, $matrix[$person])) {
                        if (!array_key_exists($key, $total)) {
                            $total[$key] = 0;
                        }

                        $total[$key] += $matrix[$otherPerson][$key] * $sim;

                        if (!array_key_exists($key, $simsum)) {
                            $simsum[$key] = 0;
                        }

                        $simsum[$key] += $sim;
                    }
                }
            }
        }

        foreach ($total as $key => $value) {
            $ranks[$key] = $value / $simsum[$key];
        }

        // Sorting DESC
        array_multisort($ranks, SORT_DESC);

        // View 3 Highest Ranks
        $limit = 3;
        $ranks_limit = array_slice($ranks, 0, $limit);

        return $ranks_limit;
    }
}
