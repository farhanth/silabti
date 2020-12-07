<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_web extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_konfigurasi');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Konfigurasi Website';
				$data['semester'] = $this->M_konfigurasi->get_semester();
				$data['at'] = $this->M_konfigurasi->get_at_editor();
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi/konfigurasi');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_konfig_semester()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$data['semester'] = $this->M_konfigurasi->set_semester();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_konfig_at()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$data['semester'] = $this->M_konfigurasi->set_at_editor();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function jadwalDrop()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$this->load->dbutil();
				$prefs = array(
					'tables'        => array('jadwal'),
				    'format'      => 'zip',             
				    'filename'    => 'jadwal.sql'
				    );
				$backup = $this->dbutil->backup($prefs); 

				$db_name = 'backup-jadwal-'. date("d-m-Y") .'-'.uniqid().'.zip';
				$save = 'backup_jadwal/'.$db_name;

				$this->load->helper('file');
				write_file($save, $backup); 

				$this->M_konfigurasi->jadwalDrop();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function log()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Log Aktifitas Website';
				$data['log'] = $this->M_konfigurasi->get_log();
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi/log');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function logDrop()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff") {
				$this->load->dbutil();
				$prefs = array(
					'tables'        => array('log'),
				    'format'      => 'zip',             
				    'filename'    => 'log.sql'
				    );
				$backup = $this->dbutil->backup($prefs); 

				$db_name = 'backup-log-'. date("d-m-Y") .'-'.uniqid().'.zip';
				$save = 'backup_log/'.$db_name;

				$this->load->helper('file');
				write_file($save, $backup);

				$this->M_konfigurasi->logDrop();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}

/* End of file Konfiguasi.php */
/* Location: ./application/Controllers/Konfigurasi.php */