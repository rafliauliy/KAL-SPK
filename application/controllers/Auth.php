<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login SPK  Online';
            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('login');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->template->load('templates/auth', 'auth/register', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role']          = 'vendor';
            $input['foto']          = 'user.png';
            $input['is_active']     = 0;
            $input['created_at']    = time();

            $query = $this->admin->insert('user', $input);
            if ($query) {
                set_pesan('daftar berhasil. Selanjutnya silahkan hubungi admin untuk mengaktifkan akun anda.');
                redirect('login');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->template->load('templates/auth', 'auth/forgot_password', $data);
        } else {
            $input = $this->input->post(null, true);
            $user = $this->auth->get_user_by_email($input['email']);

            if ($user) {
                // Generate token
                $token = bin2hex(random_bytes(50));
                $this->auth->save_reset_token($user['id_user'], $token); // Simpan token ke database

                // Kirim email
                $reset_link = base_url("auth/reset_password?token=$token");
                $this->send_reset_email($input['email'], $reset_link);

                set_pesan('Silakan cek email Anda untuk reset password.');
                redirect('auth/forgot_password');
            } else {
                set_pesan('Email tidak terdaftar', false);
                redirect('auth/forgot_password');
            }
        }
    }

    private function send_reset_email($email, $reset_link)
    {
        $this->load->library('email');
        $this->email->from('rafliauliya26@gmail.com', 'Krakatau Argo Logistics');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message("Klik link berikut untuk reset password Anda: $reset_link");

        if (!$this->email->send()) {
            log_message('error', 'Email tidak dapat dikirim.');
        }
    }

    public function reset_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/reset_password');
        } else {
            $input = $this->input->post();
            $user = $this->auth->get_user_by_email($input['email']);
            if ($user) {
                $new_password = password_hash($input['password'], PASSWORD_DEFAULT);
                $this->auth->update_password($user['id_user'], $new_password);
                $this->session->set_flashdata('message', 'Password berhasil direset.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', 'Email tidak terdaftar.');
                redirect('auth/reset_password');
            }
        }
    }
}
