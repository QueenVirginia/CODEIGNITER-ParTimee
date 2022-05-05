<?php

class Company_model extends CI_Model
{
    public function GetAllCompany()
    {
        $this->db->select('count(company.id_company) as count, company.id_company, company.nama_company, AVG(apply.rating) as rating, company.kantor_pusat, company.logo');
        $this->db->from('company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->group_by('jobs.id_company');
        $this->db->order_By('nama_company', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getCompanyById($id_company)
    {
        $this->db->select('count(company.id_company) as count, company.id_company, company.nama_company, AVG(apply.rating) as rating, company.kantor_pusat, company.logo, company.industri, company.deskripsi, company.situs, company.no_telepon');
        $this->db->from('company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->where('company.id_company', $id_company);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getCompanyJobById($id_company)
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan');
        $this->db->from('company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->where('jobs.id_company', $id_company);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function searchCompany()
    {
        $keyword = $this->input->post('cari_company', TRUE);

        $this->db->select('count(company.id_company) as count, company.id_company, company.nama_company, company.kantor_pusat, company.logo, AVG(apply.rating) as rating');
        $this->db->from('company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->like('nama_company', $keyword);
        $this->db->or_like('kantor_pusat', $keyword);
        $this->db->group_by('jobs.id_company');
        $query = $this->db->get();

        return $query->result_array();
    }
}
