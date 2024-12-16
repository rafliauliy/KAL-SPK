<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_pesan('Silakan login.');
        redirect('auth');
    } elseif (is_super_admin()) {
        // Jika super admin, dia bisa akses semua halaman, jadi biarkan.
        return;
    }
}

function is_admin()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'admin';
}

function is_super_admin()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'super admin';
}

function is_vendor()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'vendor';
}

function is_approver()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'approver';
}

function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-success'><strong>SUCCESS!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Admin_model', 'admin');

    $userId = $ci->session->userdata('login_session')['user'];
    return $ci->admin->get('user', ['id_user' => $userId])[$field];
}

function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}

function is_gm_or_tl()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'GM' || $role === 'TL';
}

function is_gm()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'GM';
}

function is_tl()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'TL';
}


function is_viewer()
{
    $ci = get_instance();
    $role = $ci->session->userdata('login_session')['role'];
    return $role === 'viewer';
}
