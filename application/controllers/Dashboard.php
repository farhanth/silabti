<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			$data['tittle'] = 'Silabti - Dashboard';
			$keyword = $this->session->userdata('nama_lengkap');
			$id_keyword = $this->session->userdata('id_user');
			$data['jadwal'] = $this->M_dashboard->jadwal($keyword);
			$data['rekap'] = $this->M_dashboard->rekap($keyword);
			$data['log'] = $this->M_dashboard->log($id_keyword);
			$this->load->view('include/header', $data);
			$this->load->view('dashboard/dashboard');
			$this->load->view('include/footer');
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function log()
	{
		if ($this->session->userdata('login') == 1) {
			$data['tittle'] = 'Silabti - Log Aktifitas';
			$id_keyword = $this->session->userdata('id_user');
			$data['log'] = $this->M_dashboard->log($id_keyword);
			$this->load->view('include/header', $data);
			$this->load->view('dashboard/log_dashboard');
			$this->load->view('include/footer');
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function rekap()
	{
		if ($this->session->userdata('login') == 1) {
			$data['tittle'] = 'Silabti - List Rekap Absen';
			$keyword = $this->session->userdata('nama_lengkap');
			$data['rekap'] = $this->M_dashboard->rekap($keyword);
			$this->load->view('include/header', $data);
			$this->load->view('dashboard/rekap_dashboard');
			$this->load->view('include/footer');
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}
