<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_action extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_absen_action');
		$this->load->model('M_absen');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Absen Asisten ';
				$data['konstanta_mhs'] = $this->M_absen_action->cek_konfig_konstanta_mhs();
				$data['variabel_mhs'] = $this->M_absen_action->cek_variabel_mhs();
				// $this->load->view('absen/test', $data);
				$this->M_absen_action->submit_absen();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function manual()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Absen Asisten (Manual)';
				$data['asisten_opt'] = $this->M_absen->get_asisten_opt();
				$data['matprak_opt'] = $this->M_absen->get_matprak_opt();
				$this->load->view('include/header', $data);
				$this->load->view('absen/absen_manual');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

}

/* End of file Absen_action.php */
/* Location: ./application/Controllers/Absen_action.php */