<?php

class Profile_model extends CI_Model
{
    public function getUserById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function getApplyById($id_user)
    {
        return $this->db->get_where('apply', ['id_user' => $id_user])->result_array();
    }
}
