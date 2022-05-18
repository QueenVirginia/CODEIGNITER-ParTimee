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
        return $this->db->get('user')->result_array();
    }

    // =============================== JOBS ===============================
    public function getAllJobs()
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan, company.nama_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_job');
        $this->db->order_By('id_job', 'DESC');

        return $this->db->get()->result_array();
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

        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan, company.nama_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_job');
        $this->db->like('jobs.id_job', $keyword);
        $this->db->or_like('jobs.nama_job', $keyword);
        $this->db->or_like('jobs.lokasi', $keyword);
        $this->db->or_like('jobs.batasan', $keyword);
        $this->db->or_like('jobs.tipe_kerja', $keyword);
        $this->db->or_like('company.nama_company', $keyword);

        return $this->db->get()->result_array();
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
        $this->db->select('company.id_company, company.nama_company, company.logo, company.kantor_pusat, company.industri, apply.id_apply, AVG(apply.rating) as rating');
        $this->db->from('company');
        $this->db->join('apply', 'apply.id_company = company.id_company', 'left');
        $this->db->order_by('id_company', 'DESC');
        $this->db->group_by('company.id_company');

        $query = $this->db->get();
        return $query->result_array();
    }

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

        $this->db->select('company.id_company, company.nama_company, company.logo, company.kantor_pusat, company.industri, apply.id_apply, AVG(apply.rating) as rating');
        $this->db->from('company');
        $this->db->join('apply', 'apply.id_company = company.id_company', 'left');
        $this->db->like('company.id_company', $keyword);
        $this->db->or_like('company.nama_company', $keyword);
        $this->db->or_like('company.kantor_pusat', $keyword);
        $this->db->or_like('company.industri', $keyword);
        $this->db->order_by('company.id_company', 'ASC');
        $this->db->group_by('company.id_company');
        $query = $this->db->get();

        return $query->result_array();
    }

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
        $this->db->select('apply.id_apply, apply.rating as rating_apply, apply.response, company.nama_company, user.nama, jobs.nama_job, user.id_user');
        $this->db->from('apply');
        $this->db->join('company', 'company.id_company = apply.id_company', 'left');
        $this->db->join('jobs', 'jobs.id_job = apply.id_job', 'left');
        $this->db->join('user', 'user.id_user = apply.id_user', 'left');
        $this->db->group_by('user.id_user, jobs.id_job, company.id_company');
        $query = $this->db->get();
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

    public function deleteDataApply($id_apply)
    {
        $this->db->where('id_apply', $id_apply);
        $this->db->delete('apply');
    }

    public function searchApply()
    {
        $keyword = $this->input->post('cari_apply', TRUE);
        $this->db->like('nama', $keyword);
        return $this->db->get('user')->result_array();
    }
}
