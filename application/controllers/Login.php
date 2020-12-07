<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        if ($this->session->userdata('login') == 1) {
            redirect('dashboard');
        } elseif ($this->session->userdata('login') == 0) {
            $this->load->view('login');
            if (isset($_POST['submit'])) {
                $this->_login_auth();
            }
        }
    }

    public function ganti_password()
    {
        if ($this->session->userdata('login') == 1) {
            redirect('dashboard');
        } elseif ($this->session->userdata('login') == 0) {
            $this->load->library('encryption');
            $npm = $this->session->userdata('npm_login0');
            $data['profil'] = $this->M_login->get_profile($npm);
            $this->load->view('ganti_password', $data);
            if (isset($_POST['submit'])) {
                $this->_update_password();
            }
        }
    }

    private function _login_auth()
    {
        $this->load->library('user_agent');

        $konfig_semester = $this->M_login->get_konfig_semester();

        $npm = $this->input->post('npm_login');
        $password = $this->input->post('password_login');
        $user = $this->db->get_where('user', ['npm' => $npm])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['ganti_password'] == "Iya") {
                    $this->session->set_userdata('npm_login0',  $user['npm']);
                    redirect('login/ganti_password','refresh');
                } else{
                    $this->session->set_userdata('login', '1');
                    $this->session->set_userdata('id_user',  $user['id_user']);
                    $this->session->set_userdata('npm',  $user['npm']);
                    $this->session->set_userdata('nama_lengkap',  $user['nama_lengkap']);
                    $this->session->set_userdata('jabatan',  $user['jabatan']);
                    $this->session->set_userdata('gambar_profil',  $user['gambar_profil']);

                    if ($this->agent->is_browser()){
                        $browser = $this->agent->browser().' '.$this->agent->version();
                        $this->session->set_userdata('browser',  $browser);
                    }elseif ($this->agent->is_mobile()){
                        $agent = $this->agent->mobile();
                        $this->session->set_userdata('browser',  $browser);
                    }else{
                        $agent = 'Data user gagal di dapatkan';
                    }
                    $this->session->set_userdata('os',  $this->agent->platform());
                    $this->session->set_userdata('ip_address',  $this->input->ip_address());

                    $this->session->set_userdata('semester',  $konfig_semester['semester']);
                    $this->session->set_userdata('tahun_awal',  $konfig_semester['tahun_awal']);
                    $this->session->set_userdata('tahun_akhir',  $konfig_semester['tahun_akhir']);
                    
                    $this->M_login->recent_login($user['id_user']);
                    
                    $deskripsi_log = "User ". $this->session->userdata('npm')." telah login.";
                    logger("Login", "-", $deskripsi_log);

                    redirect('dashboard','refresh');
                }
            }
        } else {
            $this->session->set_flashdata('message_login', 'gagal_salah');
            redirect('');
        }
    }

    private function _update_password()
    {
        $this->load->library('user_agent');
        $npm = $this->session->userdata('npm_login0');
        $user = $this->db->get_where('user', ['npm' => $npm])->row_array();
        $konfig_semester = $this->M_login->get_konfig_semester();
        $data = [
            'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
            'ganti_password' => "Tidak"
        ];
        $this->db->where('npm', $npm);
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message_ganti_password', 'Berhasil');

            $this->session->set_userdata('login', '1');
            $this->session->set_userdata('id_user',  $user['id_user']);
            $this->session->set_userdata('npm',  $user['npm']);
            $this->session->set_userdata('nama_lengkap',  $user['nama_lengkap']);
            $this->session->set_userdata('jabatan',  $user['jabatan']);
            $this->session->set_userdata('gambar_profil',  $user['gambar_profil']);

            if ($this->agent->is_browser()){
                $browser = $this->agent->browser().' '.$this->agent->version();
                $this->session->set_userdata('browser',  $browser);
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
                $this->session->set_userdata('browser',  $browser);
            }else{
                $agent = 'Data user gagal di dapatkan';
            }
            $this->session->set_userdata('os',  $this->agent->platform());
            $this->session->set_userdata('ip_address',  $this->input->ip_address());

            $this->session->set_userdata('semester',  $konfig_semester['semester']);
            $this->session->set_userdata('tahun_awal',  $konfig_semester['tahun_awal']);
            $this->session->set_userdata('tahun_akhir',  $konfig_semester['tahun_akhir']);
            
            $this->M_login->recent_login($user['id_user']);
            
            $deskripsi_log = "User ". $this->session->userdata('npm')." telah login.";
            logger("Login", "-", $deskripsi_log);

            redirect('dashboard','refresh');
        }
    }
}

/* End of file Login.php */
/* Location: ./application/Controllers/Login.php */