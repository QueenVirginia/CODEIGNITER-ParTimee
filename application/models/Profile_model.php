<?php

class Profile_model extends CI_Model
{
    public function getUserById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function editProfile()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email, true')
        ];
        // $this->db->update('user', ['nama' => $this->input->post('nama')]);
        // $this->db->update('user', ['email' => $this->input->post('email')]);

        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}
