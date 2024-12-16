<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('User_model'); // Load User model for fetching user details

        // Check if user is logged in
        cek_login(); // Cek login dulu

        // Check if user is GM or super admin
        if (!is_gm() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk halaman ini.', false);
            redirect('perusahaan/verification');
        }
    }

    public function index()
    {
        $data['title'] = "Approval List";
        $data['spk_list'] = $this->admin->get_all_spk(); // Get all SPK records regardless of status

        $this->template->load('templates/dashboard', 'approval/index', $data);
    }

    public function approve($id_spk)
    {
        // Get the name of the user who is approving
        $userId = $this->session->userdata('login_session')['user'];
        $userData = $this->User_model->get_user_by_id($userId);
        $approverName = $userData['nama']; // Assuming 'nama' is the field for user's name

        // Update SPK status and approved_by field
        $data = [
            'status_approval' => 'approved',
            'approved_by' => $approverName
        ];

        $this->admin->update('tbl_spk', 'id_spk', $id_spk, $data);

        set_pesan('Data berhasil di-approve.');
        redirect('approval');
    }

    public function approve_multiple()
    {
        // Ambil ID SPK yang dipilih dari POST request
        $ids_spk = $this->input->post('ids_spk'); // Misalnya 'ids_spk' adalah nama field dari checkbox atau select

        // Pastikan ID SPK ada dan merupakan array
        if (is_array($ids_spk) && !empty($ids_spk)) {
            // Ambil ID pengguna yang sedang login
            $userId = $this->session->userdata('login_session')['user'];
            $userData = $this->User_model->get_user_by_id($userId);
            $approverName = $userData['nama']; // Asumsikan 'nama' adalah field untuk nama pengguna

            // Persiapkan data untuk pembaruan
            $data = [
                'status_approval' => 'approved',
                'approved_by' => $approverName
            ];

            // Update status untuk setiap ID SPK yang dipilih
            foreach ($ids_spk as $id_spk) {
                $this->admin->update('tbl_spk', 'id_spk', $id_spk, $data);
            }

            set_pesan('Data berhasil di-approve.');
        } else {
            set_pesan('Tidak ada data yang dipilih untuk di-approve.');
        }

        redirect('approval');
    }

    public function reject($id_spk)
    {
        // Update SPK status to 'rejected'
        $this->admin->update('tbl_spk', 'id_spk', $id_spk, ['status_approval' => 'rejected']);

        set_pesan('Data berhasil di-reject.');
        redirect('approval');
    }

    public function detail_approval($id_spk)
    {
        $data['title'] = "Detail Might To Approve";
        $data['spk'] = $this->admin->getById($id_spk);

        if (!$data['spk']) {
            show_404();
        }

        $this->template->load('templates/dashboard', 'approval/detail_approval', $data);
    }
}
