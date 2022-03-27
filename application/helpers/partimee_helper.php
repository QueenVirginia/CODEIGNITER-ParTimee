<?php

function check_role_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $id_role = $ci->session->userdata('id_role');

        if ($id_role == 2) {
            redirect('auth/blocked');
        }
    }
}
