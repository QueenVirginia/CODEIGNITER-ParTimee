<?php

class Admin_model extends CI_Model
{
    // =============================== USER ===============================
    public function getAllUser()
    {
        $this->db->order_By('id_user', 'ASC');
        $query = $this->db->get('User');
        return $query->result_array();
    }

    public function getUserById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function countDataUser()
    {
        return $this->db->count_all_results('user');
    }

    public function deleteDataUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function searchUser()
    {
        $keyword = $this->input->post('cari_user', TRUE);
        $this->db->like('id_user', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('no_telepon', $keyword);
        return $this->db->get('user')->result_array();
    }

    // =============================== JOBS ===============================
    public function getAllJobs()
    {
        $this->db->order_By('id_job', 'DESC');
        $query = $this->db->get('Jobs');
        return $query->result_array();
    }

    public function getJobById($id_job)
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan, jobs.deskripsi_job, jobs.benefit_job, jobs.link_apply, company.nama_company as nama_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->where('id_job', $id_job);
        return $this->db->get()->row_array();
    }

    public function getJobsRow($id_job)
    {
        $this->db->select('*');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->where('id_job', $id_job);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function countDataJobs()
    {
        return $this->db->count_all_results('jobs');
    }

    public function searchJobs()
    {
        $keyword = $this->input->post('cari_job', TRUE);
        $this->db->like('id_job', $keyword);
        $this->db->or_like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        return $this->db->get('jobs')->result_array();
    }

    public function addDataJobs()
    {
        $data = [
            "nama_job" => $this->input->post('nama_job', true),
            "lokasi" => $this->input->post('lokasi', true),
            "batasan" => $this->input->post('batasan', true),
            "tipe_kerja" => $this->input->post('tipe_kerja', true),
            "deskripsi_job" => $this->input->post('deskripsi_job', true),
            "benefit_job" => $this->input->post('benefit_job', true),
            "link_apply" => $this->input->post('link_apply', true),
            "id_company" => $this->input->post('id_company', true)
        ];

        $this->db->insert('jobs', $data);
    }

    public function deleteDataJobs($id_job)
    {
        $this->db->where('id_job', $id_job);
        $this->db->delete('jobs');
    }

    public function editDataJobs()
    {
        $data = [
            "nama_job" => $this->input->post('nama_job', true),
            "lokasi" => $this->input->post('lokasi', true),
            "batasan" => $this->input->post('batasan', true),
            "tipe_kerja" => $this->input->post('tipe_kerja', true),
            "deskripsi_job" => $this->input->post('deskripsi_job', true),
            "benefit_job" => $this->input->post('benefit_job', true),
            "link_apply" => $this->input->post('link_apply', true)
        ];

        // Ngambil dari id yang hidden
        $this->db->where('id_job', $this->input->post('id'));
        $this->db->update('jobs', $data);
    }

    // =============================== COMPANY ===============================
    public function getAllCompany()
    {
        $this->db->order_By('id_company', 'ASC');
        $query = $this->db->get('Company');
        return $query->result_array();
    }

    // public function getAllCompanyJoin()
    // {
    //     $this->db->select('count(company.id_company) as count, company.id_company, company.nama_company, company.rating, company.kantor_pusat');
    //     $this->db->from('company');
    //     $this->db->join('jobs', 'jobs.id_company = company.id_company');
    //     $this->db->group_by('jobs.id_company');
    //     $this->db->order_By('nama_company', 'ASC');
    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    public function getCompanyById($id_company)
    {
        return $this->db->get_where('company', ['id_company' => $id_company])->row_array();
    }

    public function countDataCompany()
    {
        return $this->db->count_all_results('company');
    }

    public function searchCompany()
    {
        $keyword = $this->input->post('cari_company', TRUE);
        $this->db->like('id_company', $keyword);
        $this->db->or_like('nama_company', $keyword);
        $this->db->or_like('kantor_pusat', $keyword);
        $this->db->or_like('rating', $keyword);
        $this->db->or_like('industri', $keyword);
        return $this->db->get('company')->result_array();
    }

    // public function upload()
    // {
    //     $config['upload_path'] = './asset/company_logo';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $config['max_size']  = '2048';
    //     $config['remove_space'] = TRUE;

    //     $this->load->library('upload', $config); // Load konfigurasi uploadnya
    //     if ($this->upload->do_upload('input_gambar')) { // Lakukan upload dan Cek jika proses upload berhasil
    //         // Jika berhasil :
    //         $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
    //         return $return;
    //     } else {
    //         // Jika gagal :
    //         $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
    //         return $return;
    //     }
    // }

    public function deleteDataCompany($id_company)
    {
        $this->db->where('id_company', $id_company);
        $this->db->delete('company');
    }

    public function editDataCompany()
    {
        $data = [
            "nama_company" => $this->input->post('nama_company', true),
            "kantor_pusat" => $this->input->post('kantor_pusat', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "industri" => $this->input->post('industri', true),
            "situs" => $this->input->post('situs', true),
            "no_telepon" => $this->input->post('no_telepon', true)
        ];

        // Ngambil dari id yang hidden
        $this->db->where('id_company', $this->input->post('id'));
        $this->db->update('company', $data);
    }

    // =============================== DATA APPLY ===============================
    public function getAllDataApply()
    {
        $this->db->order_By('id_apply', 'ASC');
        $query = $this->db->get('Apply');
        return $query->result_array();
    }

    public function getApplyById($id_apply)
    {
        return $this->db->get_where('apply', ['id_apply' => $id_apply])->row_array();
    }

    public function countDataApply()
    {
        return $this->db->count_all_results('apply');
    }
}
