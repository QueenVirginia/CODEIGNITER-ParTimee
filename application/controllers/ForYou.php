<?php

class ForYou extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Company_model->getAllCompany();

        if ($this->input->post('cari_company')) {
            $data['company'] = $this->Company_model->searchCompany();
        }

        $this->db->select('user.nama, company.nama_company, company.rating as company_rating, company.kantor_pusat, user.nama, apply.rating as apply_rating');
        $this->db->from('apply');
        $this->db->join('company', 'company.id_company= apply.id_company');
        $this->db->join('user', 'user.id_user= apply.id_user');
        $this->db->where('apply.response', 1);
        $algos = $this->db->get()->result_array();

        // $this->db->select('*');
        // $this->db->from('algo');
        // $this->db->join('jobs', 'jobs.id_job= algo.id_job');
        // $this->db->join('user', 'user.id_user= algo.id_user');
        // $algos = $this->db->get()->result_array();

        // Select nama user yang menampilkan nama_company dan rating
        foreach ($algos as $alg) {
            $matrix[$alg['nama']][$alg['nama_company']] = $alg['apply_rating'];
        }

        // Ambil nama user aktif
        $this->db->select('nama');
        $this->db->from('user');
        $this->db->where('email', $this->session->userdata('email'));
        $nama_user = $this->db->get()->row_array();

        // echo '<pre>';
        // var_dump($matrix);
        // echo '</pre>';
        // die;

        // Ubah Array menjadi String
        $new_nama = implode(" ", $nama_user);

        $data['rec'] = $this->getRecommendations($matrix, $new_nama);

        $this->load->view('templates/header', $data);
        $this->load->view('foryou/index', $data);
        $this->load->view('templates/footer');
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

        if (($similar) == 0) {
            return 0;
        }

        // Eucalidean Distance
        foreach ($matrix[$person1] as $key => $value) {
            if (array_key_exists($key, $matrix[$person2])) {
                $sum = $sum + pow($value - $matrix[$person2][$key], 2);
            }
        }

        // Similarity
        return 1 / (1 + sqrt($sum));

        // $test = 1 / (1 + sqrt($sum));
        // echo '<pre>';
        // var_dump($test);
        // echo '</pre>';
        // die;
    }

    private function getRecommendations($matrix, $person)
    {
        $total = array();
        $simsum = array();
        $ranks = array();

        foreach ($matrix as $otherPerson => $value) {
            if ($otherPerson != $person) {
                $sim = $this->similarity_distance($matrix, $person, $otherPerson);
                // var_dump($sim);

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

        array_multisort($ranks, SORT_DESC);

        return $ranks;
    }

    public function detail($id_company)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Company_model->getCompanyById($id_company);
        $data['company_job'] = $this->Company_model->getCompanyJobById($id_company);

        $this->load->view('templates/header', $data);
        $this->load->view('foryou/detail_company', $data);
        $this->load->view('templates/footer');
    }
}
