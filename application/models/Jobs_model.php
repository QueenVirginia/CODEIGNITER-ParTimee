<?php

class Jobs_model extends CI_Model
{

    public function GetAllJobs()
    { 
        // $this->db->order_By('id_job', 'DESC');
        // $query = $this->db->get('Jobs');
        // return $query->result_array();

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
        $this->db->like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('perusahaan', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        return $this->db->get('jobs')->result_array();
    }

    public function countSearchJob()
    {
        $keyword = $this->input->post('cari_kerja', TRUE);
        $this->db->like('nama_job', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('perusahaan', $keyword);
        $this->db->or_like('batasan', $keyword);
        $this->db->or_like('tipe_kerja', $keyword);
        return $this->db->get('jobs')->count_all_results();
    }

    // public function tambahDataJobs()
    // {
    //     $data = [
    //         "nama_job" => $this->input->post('nama_job', true),
    //         "perusahaan" => $this->input->post('perusahaan', true),
    //         "lokasi" => $this->input->post('lokasi', true)
    //     ];

    //     $this->db->insert('jobs', $data);
    // }

    // public function hapusDataJobs($id_job)
    // {
    //     $this->db->where('id_job', $id_job);
    //     $this->db->delete('jobs');
    // }

    // public function ubahDataJobs()
    // {
    //     $data = [
    //         "nama_job" => $this->input->post('nama_job', true),
    //         "perusahaan" => $this->input->post('perusahaan', true),
    //         "lokasi" => $this->input->post('lokasi', true)
    //     ];

    //     // Ngambil dari id yang hidden
    //     $this->db->where('id_job', $this->input->post('id'));
    //     $this->db->update('jobs', $data);
    // }

    // public function cariDataJobs()
    // {
    //     $keyword = $this->input->post('keyword', TRUE);
    //     $this->db->like('nama_job', $keyword);
    //     $this->db->or_like('lokasi', $keyword);

    //     return $this->db->get('jobs')->result_array();
    // }
}
