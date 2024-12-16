<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_all_users()
    {
        $this->db->select('id_user, username, nama_perusahaan'); // Memilih kolom id_user, username, dan nama_perusahaan
        $query = $this->db->get('user'); // Mendapatkan data dari tabel 'user'
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
    public function get_user_by_id($userId)
    {
        $this->db->where('id_user', $userId);
        $query = $this->db->get('user');
        return $query->row_array();
    }
    public function approve_spk($id_spk)
    {
        $data = array('status_approval' => 'approved'); // Update status to approved
        $this->db->where('id_spk', $id_spk);
        $this->db->update('tbl_spk', $data);
    }
}
