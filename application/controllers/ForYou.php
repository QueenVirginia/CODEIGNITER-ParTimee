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

        $this->db->select('user.nama, company.nama_company, company.kantor_pusat, user.nama, AVG(apply.rating) as apply_rating');
        $this->db->from('apply');
        $this->db->join('company', 'company.id_company= apply.id_company');
        $this->db->join('user', 'user.id_user= apply.id_user');
        $this->db->where('apply.response', 1);
        $this->db->group_by('user.id_user, company.id_company');
        $algos = $this->db->get()->result_array();

        if ($algos != NULL) {

            // Select nama user yang menampilkan nama_company dan rating
            foreach ($algos as $alg) {
                $matrix[$alg['nama']][$alg['nama_company']] = $alg['apply_rating'];
            }

            // Mengambil nama user aktif
            $this->db->select('nama');
            $this->db->from('user');
            $this->db->where('email', $this->session->userdata('email'));
            $nama_user = $this->db->get()->row_array();

            // Ubah Array menjadi String
            $new_nama = implode(" ", $nama_user);

            $data['rec'] = $this->getRecommendations($matrix, $new_nama);
        }

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

        // Euclidean Distance
        foreach ($matrix[$person1] as $key => $value) {
            if (array_key_exists($key, $matrix[$person2])) {
                $sum = $sum + pow($value - $matrix[$person2][$key], 2);
            }
        }

        // Similarity
        return 1 / (1 + sqrt($sum));
    }

    private function getRecommendations($matrix, $person)
    {
        $total = array();
        $simsum = array();
        $ranks = array();

        foreach ($matrix as $otherPerson => $value) {
            if ($otherPerson != $person) {
                $sim = $this->similarity_distance($matrix, $person, $otherPerson);

                // Weighted Sum
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

        // Sorting DESC
        array_multisort($ranks, SORT_DESC);

        // View 3 Highest Ranks
        $limit = 3;
        $ranks_limit = array_slice($ranks, 0, $limit);

        return $ranks_limit;
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
