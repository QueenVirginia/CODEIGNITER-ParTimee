<?php

class Test_model extends CI_Model
{
    public function test()
    {
        $this->db->select('*');
        $this->db->from('algo');
        $this->db->join('user', 'user.id_user = algo.id_user');

        $query = $this->db->get();
        return $query->result_array();
    }
}
