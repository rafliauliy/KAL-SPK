<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Perusahaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login(); // Ensure the user is logged in

        $this->load->model('Perusahaan_model', 'admin');
        $this->load->model('User_model'); // Load User model
        $this->load->library('form_validation');


        // Get role and user ID from session
        $this->role = $this->session->userdata('role');
        $this->userId = $this->session->userdata('login_session')['user'];
    }

    public function index()
    {
        $data['title'] = "SPK Online";

        // Check if the user is a super admin
        if (is_super_admin()) {
            $data['perusahaan'] = $this->admin->getAllPerusahaan(); // Super Admin gets all data
        } else if (is_admin()) {
            $data['perusahaan'] = $this->admin->getAllPerusahaan(); // Admin gets all data
        } else if (is_gm_or_tl()) {
            $data['perusahaan'] = $this->admin->getPendingPerusahaan(); // GM or TL sees pending data
        } else if (is_vendor()) {
            $data['perusahaan'] = $this->admin->getApprovedPerusahaanByUserId($this->userId); // Vendor sees approved data only
        } else if (is_viewer()) {
            $data['perusahaan'] = $this->admin->getAllPerusahaan(); // Viewer sees all data
        } else {
            set_pesan('Akses ditolak.', false);
            redirect('some_error_page'); // Redirect to an error page or deny access
        }

        $this->template->load('templates/dashboard', 'perusahaan/data', $data);
    }


    private function _validasi()
    {
        $this->form_validation->set_rules('nomor_surat[]', 'Nomor Surat', 'required|trim');
        $this->form_validation->set_rules('id_user[]', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('produk[]', 'Produk', 'required|trim');
        $this->form_validation->set_rules('customer[]', 'Customer', 'required|trim');
        $this->form_validation->set_rules('asal_muat[]', 'Asal Muat', '');
        $this->form_validation->set_rules('tujuan_bongkar[]', 'Tujuan Bongkar', '');
        $this->form_validation->set_rules('tarif_jasa[]', 'Tarif Jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jual[]', 'Harga Jual', 'required|trim');
        $this->form_validation->set_rules('nomor_cs[]', 'Nomor CS', 'required|trim');
        $this->form_validation->set_rules('approval[]', 'Approval', 'required|trim');
        $this->form_validation->set_rules('rencana_kerja[]', 'Rencana kerja', '');
        $this->form_validation->set_rules('rencana_kerja_akhir[]', 'Rencana kerja Akhir', '');
        $this->form_validation->set_rules('rencana_tiba[]', 'Rencana Tiba', '');
        $this->form_validation->set_rules('jenis_pekerjaan[]', 'Jenis Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('keterangan_pekerjaan[]', 'Keterangan Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('tgl_spk[]', 'Tanggal SPK', 'required|trim');
        $this->form_validation->set_rules('volume[]', 'Volume', 'required|trim');
        $this->form_validation->set_rules('jenis_angkutan[]', 'Jenis Angkutan', '');
        $this->form_validation->set_rules('jumlah_unit[]', 'Jumlah Unit', '');
        $this->form_validation->set_rules('termin[]', 'Termin', 'required|trim');
        $this->form_validation->set_rules('mincharge[]', 'Mincharge', '');
        $this->form_validation->set_rules('nama_kapal[]', 'Nama Kapal', '');
        $this->form_validation->set_rules('perjanjian_kerja[]', 'Perjanjian Kerja', '');
        $this->form_validation->set_rules('nama_pic[]', 'Nama PIC', '');
        $this->form_validation->set_rules('jabatan_pic[]', 'Jabatan PIC', 'required|trim');
        $this->form_validation->set_rules('catatan[]', 'Catatan', '');
        $this->form_validation->set_rules('tarif_jasa_tambahan[]', 'Tarif Jasa Tambahan', '');
    }

    public function add()
    {
        if (!is_admin() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk menambah data.', false);
            redirect('perusahaan');
            return;
        }

        $this->_validasi();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah SPK";
            $data['nomor_surat'] = $this->generateNomorSurat();
            $data['user_ids'] = $this->User_model->get_all_users();
            $this->template->load('templates/dashboard', 'perusahaan/add', $data);
        } else {
            $input = $this->input->post(null, TRUE);

            list($id_user, $nama_perusahaan) = explode('|', $input['id_user'][0]);

            $data = array(
                'id_user' => $id_user,
                'nama_perusahaan' => $nama_perusahaan,
                'nomor_surat' => $input['nomor_surat'][0],
                'produk' => $input['produk'][0],
                'customer' => $input['customer'][0],
                'asal_muat' => $input['asal_muat'][0],
                'tujuan_bongkar' => $input['tujuan_bongkar'][0],
                'tarif_jasa' => $input['tarif_jasa'][0],
                'harga_jual' => $input['harga_jual'][0],
                'nomor_cs' => $input['nomor_cs'][0],
                'approval' => $input['approval'][0],
                'rencana_kerja' => $input['rencana_kerja'][0],
                'rencana_kerja_akhir' => $input['rencana_kerja_akhir'][0],
                'rencana_tiba' => $input['rencana_tiba'][0],
                'jenis_pekerjaan' => $input['jenis_pekerjaan'][0],
                'keterangan_pekerjaan' => $input['keterangan_pekerjaan'][0],
                'tgl_spk' => $input['tgl_spk'][0],
                'volume' => $input['volume'][0],
                'jenis_angkutan' => $input['jenis_angkutan'][0],
                'jumlah_unit' => $input['jumlah_unit'][0],
                'termin' => $input['termin'][0],
                'mincharge' => $input['mincharge'][0],
                'nama_kapal' => $input['nama_kapal'][0],
                'perjanjian_kerja' => $input['perjanjian_kerja'][0],
                'nama_pic' => $input['nama_pic'][0],
                'jabatan_pic' => $input['jabatan_pic'][0],
                'catatan' => $input['catatan'][0],
                'tarif_jasa_tambahan' => $input['tarif_jasa_tambahan'][0],
                'status_verifikasi' => 'pending',
                'status_approval' => 'pending'  // Set status to pending initially
            );

            $insert = $this->admin->insert('tbl_spk', $data);

            if ($insert) {
                set_pesan('Data berhasil disimpan dan menunggu Verifikasi & Approval.');
                redirect('perusahaan');
            } else {
                set_pesan('Gagal menyimpan data.', false);
                redirect('perusahaan/add');
            }
        }
    }


    public function approve($id_spk)
    {
        if (!is_approver()) {
            set_pesan('Anda tidak memiliki hak akses untuk menyetujui data.', false);
            redirect('perusahaan');
        }

        $result = $this->admin->updateStatus($id_spk, 'approved');

        if ($result) {
            set_pesan('Data berhasil disetujui.');
            redirect('perusahaan');
        } else {
            set_pesan('Gagal menyetujui data.', false);
            redirect('perusahaan');
        }
    }

    public function reject($id_spk)
    {
        if (!is_approver()) {
            set_pesan('Anda tidak memiliki hak akses untuk menolak data.', false);
            redirect('perusahaan');
        }

        $result = $this->admin->updateStatus($id_spk, 'rejected');

        if ($result) {
            set_pesan('Data berhasil ditolak.');
            redirect('perusahaan');
        } else {
            set_pesan('Gagal menolak data.', false);
            redirect('perusahaan');
        }
    }

    public function verification()
    {
        $data['title'] = "Verifikasi SPK";

        // Hanya GM, TL, atau Super Admin yang bisa mengakses halaman ini
        if (is_gm_or_tl() || is_super_admin()) {
            $data['perusahaan'] = $this->admin->getSortedVerificationPerusahaan();
            $this->template->load('templates/dashboard', 'perusahaan/verification', $data);
        } else {
            set_pesan('Akses ditolak.', false);
            redirect('some_error_page'); // Redirect ke halaman error jika bukan GM, TL, atau Super Admin
        }
    }

    public function verify($id_spk)
    {
        // Hanya GM, TL, atau Super Admin yang bisa melakukan verifikasi
        if (!is_gm_or_tl() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk memverifikasi data.', false);
            redirect('perusahaan/verification');
        }

        // Proses verifikasi data
        $result = $this->admin->updateStatusVerification($id_spk, 'verified');

        if ($result) {
            // Setelah status diverifikasi, generate nomor unik 10 karakter
            $unique_number = mt_rand(1000000000, 9999999999); // Nomor acak 10 digit

            // Update nomor unik ke database
            $data = [
                'nomor_uniq' => $unique_number
            ];

            // Update field 'nomor_uniq' di tabel 'tbl_spk'
            $this->admin->update('tbl_spk', 'id_spk', $id_spk, $data);

            // Set pesan sukses
            set_pesan('Data berhasil diverifikasi dan nomor unik telah tersimpan.');
        } else {
            // Set pesan error jika gagal memverifikasi
            set_pesan('Gagal memverifikasi data.', false);
        }

        // Redirect kembali ke halaman verifikasi
        redirect('perusahaan/verification');
    }



    public function reject_verification($id_spk)
    {
        if (!is_gm_or_tl() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk menolak verifikasi data.', false);
            redirect('perusahaan/verification');
        }

        $result = $this->admin->updateStatusVerification($id_spk, 'rejected');

        if ($result) {
            set_pesan('Data berhasil ditolak verifikasi.');
        } else {
            set_pesan('Gagal menolak verifikasi data.', false);
        }

        redirect('perusahaan/verification');
    }

    public function revisi($id_spk)
    {
        // Cek apakah user memiliki hak akses (admin atau role tertentu)
        if (!is_gm_or_tl() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk melakukan revisi data.', false);
            redirect('perusahaan');
        }

        // Lakukan update status menjadi 'revisi' melalui model
        $result = $this->admin->updateStatusVerification($id_spk, 'revisi');

        // Cek hasil update
        if ($result) {
            set_pesan('Data berhasil direvisi.');
        } else {
            set_pesan('Gagal melakukan revisi data.', false);
        }

        // Redirect kembali ke halaman perusahaan atau halaman yang diinginkan
        redirect('perusahaan/verification');
    }



    public function multiple_verify()
    {
        // Hanya GM, TL, atau Super Admin yang bisa melakukan verifikasi
        if (!is_gm_or_tl() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk memverifikasi data.', false);
            redirect('perusahaan/verification');
        }

        // Mendapatkan daftar id_spk dari input form
        $id_spk_list = $this->input->post('id_spk');

        if ($id_spk_list) {
            foreach ($id_spk_list as $id_spk) {
                // Update status verifikasi menjadi 'verified'
                $this->admin->updateStatusVerification($id_spk, 'verified');

                // Generate nomor unik 10 digit untuk setiap id_spk
                $unique_number = mt_rand(1000000000, 9999999999); // Nomor acak 10 digit

                // Update nomor unik ke database
                $data = [
                    'nomor_uniq' => $unique_number
                ];

                // Update field 'nomor_uniq' di tabel 'tbl_spk'
                $this->admin->update('tbl_spk', 'id_spk', $id_spk, $data);
            }

            // Set pesan sukses setelah semua data diverifikasi
            set_pesan('Data berhasil diverifikasi dan nomor unik telah tersimpan untuk setiap data.');
        } else {
            // Set pesan error jika tidak ada data yang dipilih
            set_pesan('Tidak ada data yang dipilih.', false);
        }

        // Redirect kembali ke halaman verifikasi
        redirect('perusahaan/verification');
    }




    public function generateNomorSurat()
    {
        $this->load->model('Perusahaan_model');

        // Dapatkan nomor surat terakhir
        $lastNumber = $this->Perusahaan_model->getLastNomorSurat();

        // Format nomor surat dengan 8 digit, menambahkan nol di depan
        $newNumber = str_pad($lastNumber + 1, 8, '0', STR_PAD_LEFT);

        return $newNumber;
    }


    public function edit($id_spk = NULL)
    {
        if (!is_admin() && !is_super_admin() && !is_tl()) {
            set_pesan('Anda tidak memiliki hak akses untuk mengedit data.', false);
            redirect('perusahaan');
            return;
        }

        // Cek apakah ID valid
        if ($id_spk === NULL || !$this->admin->getById($id_spk)) {
            set_pesan('Data tidak ditemukan.', false);
            redirect('perusahaan');
            return;
        }

        $this->_validasi();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit SPK";

            // Fetch data to be edited
            $data['perusahaan'] = $this->admin->getById($id_spk);

            // Fetch user IDs and names from User_model
            $data['user_ids'] = $this->User_model->get_all_users();

            $this->template->load('templates/dashboard', 'perusahaan/edit', $data);
        } else {
            $input = $this->input->post(null, TRUE);

            // Separate id_user and nama_perusahaan from dropdown value
            list($id_user, $nama_perusahaan) = explode('|', $input['id_user'][0]);

            $data = array(
                'id_user' => $id_user,
                'nama_perusahaan' => $nama_perusahaan,
                'nomor_surat' => $input['nomor_surat'][0],
                'produk' => $input['produk'][0],
                'customer' => $input['customer'][0],
                'asal_muat' => $input['asal_muat'][0],
                'tujuan_bongkar' => $input['tujuan_bongkar'][0],
                'tarif_jasa' => $input['tarif_jasa'][0],
                'harga_jual' => $input['harga_jual'][0],
                'nomor_cs' => $input['nomor_cs'][0],
                'approval' => $input['approval'][0],
                'rencana_kerja' => $input['rencana_kerja'][0],
                'rencana_kerja_akhir' => $input['rencana_kerja_akhir'][0],
                'rencana_tiba' => $input['rencana_tiba'][0],
                'jenis_pekerjaan' => $input['jenis_pekerjaan'][0],
                'keterangan_pekerjaan' => $input['keterangan_pekerjaan'][0],
                'tgl_spk' => $input['tgl_spk'][0],
                'volume' => $input['volume'][0],
                'jenis_angkutan' => $input['jenis_angkutan'][0],
                'jumlah_unit' => $input['jumlah_unit'][0],
                'termin' => $input['termin'][0],
                'mincharge' => $input['mincharge'][0],
                'nama_kapal' => $input['nama_kapal'][0],
                'perjanjian_kerja' => $input['perjanjian_kerja'][0],
                'nama_pic' => $input['nama_pic'][0],
                'jabatan_pic' => $input['jabatan_pic'][0],
                'catatan' => $input['catatan'][0],
                'tarif_jasa_tambahan' => $input['tarif_jasa_tambahan'][0],
                'status_verifikasi' => 'pending',
                'status_approval' => 'pending'  // Set status to pending initially
            );

            $update = $this->admin->update('tbl_spk', 'id_spk', $id_spk, $data);

            if ($update) {
                set_pesan('Data berhasil diupdate.');

                // Redirect berdasarkan role
                if (is_admin() || is_super_admin()) {
                    redirect('perusahaan');
                } elseif (is_tl()) {
                    redirect('perusahaan/verification');
                }
            } else {
                set_pesan('Gagal mengupdate data.', false);
                redirect('perusahaan/edit/' . $id_spk);
            }
        }
    }


    public function delete($id_spk = NULL)
    {
        if (!is_admin() && !is_super_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk menghapus data.', false);
            redirect('perusahaan');
            return;
        }


        // Cek apakah ID valid
        if ($id_spk === NULL || !$this->admin->getById($id_spk)) {
            set_pesan('Data tidak ditemukan.', false);
            redirect('perusahaan');
            return;
        }

        $delete = $this->admin->delete('tbl_spk', 'id_spk', $id_spk);

        if ($delete) {
            set_pesan('Data berhasil dihapus.');
        } else {
            set_pesan('Gagal menghapus data.', false);
        }

        redirect('perusahaan');
    }

    // Fungsi untuk menampilkan halaman print SPK
    public function print_spk($id_spk)
    {
        $data['title'] = 'Surat Perintah Kerja';
        $data['tbl_spk'] = $this->Perusahaan_model->getById($id_spk);
        $this->load->library('pdfgenerator');
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "potrait";
        // Load view untuk print
        $html = $this->load->view('perusahaan/print', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // Fungsi untuk menampilkan halaman print SPK Stevedoring
    public function print_spk_stevedoring($id_spk)
    {
        $data['title'] = 'Surat Perintah Kerja Stevedoring';
        $data['tbl_spk'] = $this->Perusahaan_model->getById($id_spk);
        $this->load->library('pdfgenerator');
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "potrait";

        // Load view khusus untuk print Stevedoring
        $html = $this->load->view('perusahaan/print_stevedoring', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function detail($id_spk)
    {
        $data['title'] = "SPK Online";
        // Mengambil data berdasarkan id_spk
        $data['data'] = $this->Perusahaan_model->getById($id_spk);

        $this->template->load('templates/dashboard', 'perusahaan/detail_data', $data);
    }

    public function exportExcel()
    {
        // Ambil seluruh data dari database
        $data = $this->Perusahaan_model->getAllPerusahaan();

        // Tentukan header untuk format Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"Data_SPK.xls\"");
        header("Cache-Control: max-age=0");

        // Membuka output stream
        echo '<table border="1">';
        echo '<tr><th colspan="31" style="text-align: center;">Data SPK</th></tr>';

        // Judul Kolom (tanpa Tarif Jasa Tambahan)
        echo '<tr>
            <th>Nomor Surat</th>
            <th>Nama Perusahaan</th>
            <th>Produk</th>
            <th>Keterangan Pekerjaan</th>
            <th>Customer</th>
            <th>Asal Muat</th>
            <th>Tujuan Bongkar</th>
            <th>Tarif Jasa</th>
            <th>Harga Jual</th>
            <th>Nomor CS</th>
            <th>Jenis Pekerjaan</th>
            <th>Tanggal SPK</th>
            <th>Volume</th>
            <th>Jenis Angkutan</th>
            <th>Jumlah Unit</th>
            <th>Termin</th>
            <th>Min Charge</th>
            <th>Nama Kapal</th>
            <th>Nama PIC</th>
            <th>Jabatan PIC</th>
            <th>Approval</th>
            <th>Rencana Kerja</th>
            <th>Rencana Kerja Akhir</th>
            <th>Rencana Tiba</th>
            <th>Perjanjian Kerja</th>
            <th>Created At</th>
            <th>ID User</th>
            <th>Approved By</th>
            <th>Status Approval</th>
            <th>Status Verifikasi</th>
            <th>Nomor Unik</th>
            <th>Catatan</th>
        </tr>';

        // Menulis data ke dalam format tabel
        foreach ($data as $item) {
            echo '<tr>
                <td>' . $item['nomor_surat'] . '</td>
                <td>' . $item['nama_perusahaan'] . '</td>
                <td>' . $item['produk'] . '</td>
                <td>' . $item['keterangan_pekerjaan'] . '</td>
                <td>' . $item['customer'] . '</td>
                <td>' . $item['asal_muat'] . '</td>
                <td>' . $item['tujuan_bongkar'] . '</td>
                <td>' . $item['tarif_jasa'] . '</td>
                <td>' . $item['harga_jual'] . '</td>
                <td>' . $item['nomor_cs'] . '</td>
                <td>' . $item['jenis_pekerjaan'] . '</td>
                <td>' . $item['tgl_spk'] . '</td>
                <td>' . $item['volume'] . '</td>
                <td>' . $item['jenis_angkutan'] . '</td>
                <td>' . $item['jumlah_unit'] . '</td>
                <td>' . $item['termin'] . '</td>
                <td>' . $item['mincharge'] . '</td>
                <td>' . $item['nama_kapal'] . '</td>
                <td>' . $item['nama_pic'] . '</td>
                <td>' . $item['jabatan_pic'] . '</td>
                <td>' . $item['approval'] . '</td>
                <td>' . $item['rencana_kerja'] . '</td>
                <td>' . $item['rencana_kerja_akhir'] . '</td>
                <td>' . $item['rencana_tiba'] . '</td>
                <td>' . $item['perjanjian_kerja'] . '</td>
                <td>' . $item['created_at'] . '</td>
                <td>' . $item['id_user'] . '</td>
                <td>' . $item['approved_by'] . '</td>
                <td>' . $item['status_approval'] . '</td>
                <td>' . $item['status_verifikasi'] . '</td>
                <td>' . $item['nomor_uniq'] . '</td>
                <td>' . $item['catatan'] . '</td>
            </tr>';
        }

        echo '</table>';
        exit;
    }


    public function detail_verify($id_spk)
    {
        $data['title'] = "Detail Data Might To Verify";
        $data['spk'] = $this->admin->getById($id_spk);

        if (!$data['spk']) {
            show_404();
        }

        $this->template->load('templates/dashboard', 'perusahaan/detail_verify', $data);
    }
}
