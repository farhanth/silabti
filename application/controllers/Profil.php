<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profil');
	}

	public function _remap($npm)
	{
		if ($this->session->userdata('login') == 1) {
			$this->load->library('encryption');
			$nama = $this->session->userdata('nama_lengkap');
			$data['tittle'] = 'Profile - '.$nama;
			$data['profil'] = $this->M_profil->get_profil($npm);
			$data['log'] = $this->M_profil->get_log($npm);
			$data['jadwal_pj'] = $this->M_profil->get_jadwal_pj($npm);
			$data['jadwal_asisten'] = $this->M_profil->get_jadwal_asisten($npm);
			$this->load->view('include/header', $data);
			$this->load->view('profil/profil');
			$this->load->view('include/footer');	
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}

/* End of file Profile.php */
/* Location: ./application/Controllers/Profile.php */