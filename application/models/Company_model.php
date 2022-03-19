<?php

class Company_model extends CI_Model
{
    public function GetAllCompany()
    { 
        $this->db->order_By('id_company', 'DESC');
        $query = $this->db->get('company');
        return $query->result_array();

        // $this->db->select('*');
        // $this->db->from('jobs');
        // $this->db->join('company', 'company.id_company = jobs.id_company');
        // $this->db->order_By('id_job', 'DESC');
        // $query = $this->db->get();
        // return $query->result_array();
    }

    public function getCompanyById($id_company)
    {
        return $this->db->get_where('company', ['id_company' => $id_company])->row_array();
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