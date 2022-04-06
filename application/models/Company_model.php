<?php

class Company_model extends CI_Model
{
    public function GetAllCompany()
    {
        $this->db->select('count(company.id_company) as count, company.id_company, company.nama_company, company.rating, company.kantor_pusat, company.logo');
        $this->db->from('company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->group_by('jobs.id_company');
        $this->db->order_By('nama_company', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getCompanyById($id_company)
    {
        return $this->db->get_where('company', ['id_company' => $id_company])->row_array();
    }

    public function getCompanyJobById($id_company)
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan');
        $this->db->from('company');
        $this->db->join('jobs', 'jobs.id_company = company.id_company');
        $this->db->where('jobs.id_company', $id_company);
        // $this->db->order_By('nama_company', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function searchCompany()
    {
        $keyword = $this->input->post('cari_company', TRUE);
        $this->db->like('nama_company', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('rating', $keyword);

        return $this->db->get('company')->result_array();
    }
}
