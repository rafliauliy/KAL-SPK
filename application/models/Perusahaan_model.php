<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMax($table, $field)
    {
        $this->db->select_max($field);
        $query = $this->db->get($table);
        return $query->row()->$field;
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function get_all($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function update($table, $field, $id, $data)
    {
        $this->db->where($field, $id);
        return $this->db->update($table, $data);
    }

    public function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->delete($table);
    }

    public function getAllPerusahaan()
    {
        // Add ORDER BY clause to sort by created_at in descending order
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tbl_spk')->result_array();
    }


    public function getPerusahaanByUserId($userId)
    {
        return $this->db->get_where('tbl_spk', ['id_user' => $userId])->result_array();
    }


    public function getLastNomorSurat()
    {
        $this->db->select('nomor_surat');
        $this->db->from('tbl_spk');
        $this->db->order_by('id_spk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $lastNumber = explode("/", $row->nomor_surat)[0];
            return (int) str_replace("No.", "", $lastNumber);
        } else {
            return 0; // Jika tidak ada data, mulai dari 0001
        }
    }
    public function getPendingPerusahaan()
    {
        $this->db->where('status_approval', 'pending');
        return $this->db->get('tbl_spk')->result_array();
    }

    public function getApprovedPerusahaanByUserId($userId)
    {
        $this->db->where('id_user', $userId);
        $this->db->where('status_approval', 'approved');
        return $this->db->get('tbl_spk')->result_array();
    }

    // Fungsi untuk mendapatkan data SPK berdasarkan ID
    public function getById($id_spk)
    {
        $this->db->where('id_spk', $id_spk);
        return $this->db->get('tbl_spk')->row_array();
    }

    public function getAllVerificationPerusahaan()
    {
        // Mengambil semua data dari tabel `tbl_spk` tanpa memfilter berdasarkan status verifikasi
        return $this->db->get('tbl_spk')->result_array();
    }


    public function updateStatusVerification($id_spk, $status)
    {
        $this->db->set('status_verifikasi', $status);
        $this->db->where('id_spk', $id_spk);
        return $this->db->update('tbl_spk');
    }

    public function getSortedVerificationPerusahaan()
    {
        // Memisahkan urutan berdasarkan status verifikasi secara manual
        $this->db->order_by("status_verifikasi = 'pending'", "DESC");
        $this->db->order_by("status_verifikasi = 'verified'", "DESC");
        $this->db->order_by("status_verifikasi = 'rejected'", "ASC");
        return $this->db->get('tbl_spk')->result_array();
    }

    public function countTotalSpk()
    {
        return $this->db->count_all('tbl_spk');
    }
}
