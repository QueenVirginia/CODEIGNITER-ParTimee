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

    // =============================== JOBS ===============================
    public function getAllJobs()
    { 
        $this->db->order_By('id_job', 'DESC');
        $query = $this->db->get('Jobs');
        return $query->result_array();
    }

    public function getJobById($id_job)
    {
        return $this->db->get_where('jobs', ['id_job' => $id_job])->row_array();
    }

    public function countDataJobs()
    {
        return $this->db->count_all_results('jobs');
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
            "link_apply" => $this->input->post('link_apply', true)
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

    public function getCompanyById($id_company)
    {
        return $this->db->get_where('company', ['id_company' => $id_company])->row_array();
    }

    public function countDataCompany()
    {
        return $this->db->count_all_results('company');
    }

    public function addDataCompany()
    {
        $data = [
            "nama_company" => $this->input->post('nama_company', true),
            "kantor_pusat" => $this->input->post('kantor_pusat', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "industri" => $this->input->post('industri', true),
            "situs" => $this->input->post('situs', true),
            "no_telepon" => $this->input->post('no_telepon', true)
            // "logo" => $this->input->post('logo', true)
        ];

        $this->db->insert('company', $data);
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
            // "logo" => $this->input->post('logo', true)
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