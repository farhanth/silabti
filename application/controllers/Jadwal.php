<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jadwal');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			$data['tittle'] = 'Silabti - Jadwal Asisten';
			$this->load->view('include/header', $data);
			$this->load->view('jadwal/jadwal');
			$this->load->view('include/footer');
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function cari()
	{
		if ($this->session->userdata('login') == 1) {
			$keyword = $this->input->get('keyword');
			if (!empty($keyword)) {
				$data['tittle'] = 'Silabti - Jadwal Asisten';
				$data['jadwal'] = $this->M_jadwal->cari($this->input->get('keyword'));
				$this->load->view('include/header', $data);
				$this->load->view('jadwal/cari');
				$this->load->view('include/footer');
			}else{
				redirect('jadwal','refresh');
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function pengaturan($ruang = NULL)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - Pengaturan Jadwal Asisten';
				$data['ruang_opt'] = $this->M_jadwal->get_ruang_opt();
				$data['jadwal'] = $this->M_jadwal->get_all($ruang);
				$this->load->view('include/header', $data);
				$this->load->view('jadwal/setting_jadwal');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$data['tittle'] = 'Silabti - Tambah Jadwal Asisten';
				$data['matprak_opt'] = $this->M_jadwal->get_matprak_opt();
				$data['asisten_opt'] = $this->M_jadwal->get_asisten_opt();
				$this->load->view('include/header', $data);
				$this->load->view('jadwal/tambah_jadwal');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_jadwal->insert();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function delete($id_jadwal)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_jadwal->delete($id_jadwal);
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function edit($id_jadwal)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$data['tittle'] = 'Silabti - Edit Jadwal Asisten';
				$data['matprak_opt'] = $this->M_jadwal->get_matprak_opt();
				$data['asisten_opt'] = $this->M_jadwal->get_asisten_opt();
				$data['jadwal'] = $this->M_jadwal->get_row($id_jadwal);
				$this->load->view('include/header', $data);
				$this->load->view('jadwal/edit_jadwal');
				$this->load->view('include/footer');
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_edit()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_jadwal->submit_edit();
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}

/* End of file Jadwal.php */
/* Location: ./application/Controllers/Jadwal.php */