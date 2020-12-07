<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_rekap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_konfigurasi_rekap');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Konfigurasi Rekap';
				$data['variabel_mhs'] = $this->M_konfigurasi_rekap->get_variabel_mhs();
				$data['konstanta_mhs'] = $this->M_konfigurasi_rekap->get_konstanta_mhs();
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi_rekap/konfigurasi_rekap');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function gaji()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Konfigurasi Gaji';
				$data['gaji'] = $this->M_konfigurasi_rekap->get_gaji_perjam();
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi_rekap/konfigurasi_gaji');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function edit_gaji($id_gaji_perjam)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Konfigurasi Gaji';
				$data['gaji'] = $this->M_konfigurasi_rekap->get_row_gaji_perjam($id_gaji_perjam);
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi_rekap/edit_gaji');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_edit_gaji()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['gaji'] = $this->M_konfigurasi_rekap->submit_edit_gaji();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_edit_variabel_mhs()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['gaji'] = $this->M_konfigurasi_rekap->submit_edit_variabel_mhs();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_edit_konstanta_mhs()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['gaji'] = $this->M_konfigurasi_rekap->submit_edit_konstanta_mhs();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}

/* End of file konfigurasi_rekap.php */
/* Location: ./application/Controllers/konfigurasi_rekap.php */