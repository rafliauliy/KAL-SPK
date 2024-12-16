<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getUserById($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function updateUser($id_user, $data)
    {

        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }
    public function get_perusahaan($id)
    {
        return $this->db->get_where('perusahaan', ['id' => $id])->row_array();
    }

    public function update_perusahaan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('perusahaan', $data);
    }
    public function checkIfExists($table, $column, $value)
    {
        $this->db->from($table);
        $this->db->where($column, $value);
        $query = $this->db->get();

        return $query->num_rows() > 0;
    }
    public function get_by_status($status)
    {
        return $this->db->get_where('tbl_spk', ['status_approval' => $status])->result_array();
    }
    public function get_all_spk()
    {
        $this->db->order_by("status_approval = 'approved'", 'ASC'); // Order by non-approved first
        $query = $this->db->get('tbl_spk'); // Assuming the table is named 'tbl_spk'
        return $query->result_array();
    }
    public function count_users_by_role($role)
    {
        $this->db->where('role', $role);
        return $this->db->count_all_results('user');
    }

    // Method untuk menghitung jumlah SPK, SPK yang ter-approve, dan total yang di-reject
    public function get_spk_stats($month, $year)
    {
        // Query untuk menghitung jumlah SPK berdasarkan bulan dan tahun
        $this->db->select('COUNT(*) as total_spk');
        $this->db->from('tbl_spk');
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);
        $query = $this->db->get();
        $total_spk = $query->row()->total_spk;

        // Query untuk menghitung jumlah SPK yang sudah ter-approve
        $this->db->select('COUNT(*) as approved_spk');
        $this->db->from('tbl_spk');
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);
        $this->db->where('status_approval', 'approved');
        $query = $this->db->get();
        $approved_spk = $query->row()->approved_spk;

        // Query untuk menghitung jumlah SPK yang di-reject
        $this->db->select('COUNT(*) as rejected_spk');
        $this->db->from('tbl_spk');
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);
        $this->db->where('status_approval', 'rejected');
        $query = $this->db->get();
        $rejected_spk = $query->row()->rejected_spk;

        return [
            'total_spk' => $total_spk,
            'approved_spk' => $approved_spk,
            'rejected_spk' => $rejected_spk
        ];
    }
    public function updateStatusVerification($id_spk, $status, $catatan = null)
    {
        $this->db->set('status', $status);
        if ($catatan !== null) {
            $this->db->set('catatan', $catatan);
        }
        $this->db->where('id_spk', $id_spk);
        return $this->db->update('tbl_spk');
    }
    public function countPendingVerification()
    {
        $this->db->where('status_verifikasi', 'pending'); // Sesuaikan dengan status yang digunakan
        return $this->db->count_all_results('tbl_spk');
    }

    public function countPendingStatus($column, $status)
    {
        $this->db->where($column, $status);
        return $this->db->count_all_results('tbl_spk');
    }

    public function getById($id)
    {
        return $this->db->get_where('tbl_spk', ['id_spk' => $id])->row_array();
    }
}
