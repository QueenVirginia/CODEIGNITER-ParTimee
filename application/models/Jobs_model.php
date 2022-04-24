<?php

class Jobs_model extends CI_Model
{

    public function GetAllJobs()
    {
        $this->db->select('*');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->order_By('id_job', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJobById($id_job)
    {
        return $this->db->get_where('jobs', ['id_job' => $id_job])->row_array();
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

    public function countData()
    {
        return $this->db->count_all_results('jobs');
    }

    public function searchJob()
    {
        $keyword = $this->input->post('cari_kerja', TRUE);

        $this->db->select('*');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('nama_company', $keyword);
        $this->db->or_like('rating', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        return $this->db->get('jobs')->result_array();
    }

    public function countSearchJob()
    {
        $keyword = $this->input->post('cari_kerja', TRUE);

        $this->db->select('*');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('nama_company', $keyword);
        $this->db->or_like('rating', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        return $this->db->get('jobs')->count_all_results();
    }
}
