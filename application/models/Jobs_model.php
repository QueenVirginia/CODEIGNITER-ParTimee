<?php

class Jobs_model extends CI_Model
{

    public function GetAllJobs()
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan, AVG(apply.rating) as rating, company.logo, company.nama_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->group_by('jobs.id_job');
        $this->db->order_by('id_job', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJobById($id_job)
    {
        return $this->db->get_where('jobs', ['id_job' => $id_job])->row_array();
    }

    public function getJobsRow($id_job)
    {
        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.link_apply, jobs.deskripsi_job, jobs.link_apply, jobs.batasan, jobs.benefit_job, AVG(apply.rating) as rating, company.logo, company.nama_company, company.deskripsi, company.industri, company.kantor_pusat, company.id_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->group_by('jobs.id_job');
        $this->db->where('jobs.id_job', $id_job);

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

        $this->db->select('jobs.id_job, jobs.nama_job, jobs.lokasi, jobs.tipe_kerja, jobs.batasan, AVG(apply.rating) as rating, company.logo, company.nama_company');
        $this->db->from('jobs');
        $this->db->join('company', 'company.id_company = jobs.id_company');
        $this->db->join('apply', 'apply.id_company = company.id_company');
        $this->db->like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('nama_company', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        $this->db->group_by('jobs.id_job');
        $this->db->order_by('id_job', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function countSearchJob()
    // {
    //     $keyword = $this->input->post('cari_kerja', TRUE);

    //     $this->db->select('*');
    //     $this->db->join('company', 'company.id_company = jobs.id_company');
    //     $this->db->like('nama_job', $keyword);
    //     $this->db->or_like('lokasi', $keyword);
    //     $this->db->or_like('nama_company', $keyword);
    //     $this->db->or_like('rating', $keyword);
    //     $this->db->or_like('batasan', $keyword);
    //     $this->db->or_like('tipe_kerja', $keyword);

    //     return $this->db->get('jobs')->count_all_results();
    // }
}
