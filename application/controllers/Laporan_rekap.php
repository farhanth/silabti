<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_rekap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan_rekap');
	}

	public function dasar()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Laporan Rekap Absen';
				$this->load->view('include/header', $data);
				$this->load->view('rekap_laporan/input_periode_dasar');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function menengah_lanjut()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Laporan Rekap Absen';
				$this->load->view('include/header', $data);
				$this->load->view('rekap_laporan/input_periode_menengah_lanjut');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function mingguan()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$this->load->library('encryption');
				$data['tittle'] = 'Silabti - Laporan Rekap Absen Mingguan';
				$tanggal_awal = $this->input->post('rekap_min');
				$tanggal_akhir = $this->input->post('rekap_max');
				$page = $this->input->post('page');
				if (count($page) == 1) {
					$data['tingkat_lab'] = ['Dasar'];
					$data['rekap'] = $this->M_laporan_rekap->get_data_dasar($tanggal_awal, $tanggal_akhir);
				} else{
					$data['tingkat_lab'] = ["Menengah", "Lanjut"];
					$data['rekap'] = $this->M_laporan_rekap->get_data_menengah_lanjut($tanggal_awal, $tanggal_akhir);
				}
				$data['asisten'] = $this->M_laporan_rekap->get_asisten();
				$this->load->view('include/header', $data);
				$this->load->view('rekap_laporan/laporan_mingguan');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function total()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$this->load->library('encryption');
				$data['tittle'] = 'Silabti - Laporan Rekap Absen Total';
				$data['honor_perjam'] = $this->M_laporan_rekap->get_honor();
				$tanggal_awal = $this->input->post('rekap_min');
				$tanggal_akhir = $this->input->post('rekap_max');
				$page = $this->input->post('page');
				if (count($page) == 1) {
					$data['tingkat_lab'] = ['Dasar'];
					$data['rekap'] = $this->M_laporan_rekap->get_data_dasar($tanggal_awal, $tanggal_akhir);
				} else{
					$data['tingkat_lab'] = ["Menengah", "Lanjut"];
					$data['rekap'] = $this->M_laporan_rekap->get_data_menengah_lanjut($tanggal_awal, $tanggal_akhir);
				}
				$data['asisten'] = $this->M_laporan_rekap->get_asisten();
				$this->load->view('include/header', $data);
				$this->load->view('rekap_laporan/laporan_total');
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

/* End of file laporan_rekap.php */
/* Location: ./application/Controllers/laporan_rekap.php */