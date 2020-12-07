<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_absen');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function _remap($ruang, $shift)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Absen Asisten '.$ruang;
				$data['ruang'] = $ruang;
				$data['shift'] = $shift[0];
				$data['asisten_opt'] = $this->M_absen->get_asisten_opt();
				$shift = $shift[0];
				$data['cek_rekap'] = $this->M_absen->cek_rekap($ruang, $shift);
				$data['jadwal_pj'] = $this->M_absen->get_jadwal_pj($ruang, $shift);
				$data['jadwal_asisten'] = $this->M_absen->get_jadwal_asisten($ruang, $shift);
				$this->load->view('include/header', $data);
				$this->load->view('absen/absen');
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

/* End of file Absen.php */
/* Location: ./application/Controllers/Absen.php */