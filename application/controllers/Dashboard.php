<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        // Ambil statistik SPK untuk bulan ini dan tahun ini
        $month = date('m');
        $year = date('Y');
        $data['spk_stats'] = $this->admin->get_spk_stats($month, $year);

        // Ambil jumlah pengguna berdasarkan peran
        $data['super_admin_count'] = $this->admin->count_users_by_role('Super Admin');
        $data['admin_count'] = $this->admin->count_users_by_role('Admin');
        $data['gm_tl_count'] = $this->admin->count_users_by_role('GM');
        $data['vendor_count'] = $this->admin->count_users_by_role('Vendor');

        // Ambil jumlah pending verifikasi dan approval
        $data['pending_verification'] = $this->admin->countPendingStatus('status_verifikasi', 'pending');
        $data['pending_approval'] = $this->admin->countPendingStatus('status_approval', 'pending');

        // Ambil total data dalam tbl_spk
        $data['total_spk_data'] = $this->Perusahaan_model->countTotalSpk();

        // Load template dengan data
        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
