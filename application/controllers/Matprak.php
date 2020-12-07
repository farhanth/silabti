<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matprak extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_matprak');
	}
	
	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			$data['tittle'] = 'Silabti - List Mata Praktikum';
			$data['matprak'] = $this->M_matprak->get_all_matprak();
			$this->load->view('include/header', $data);
			$this->load->view('matprak/matprak');
			$this->load->view('include/footer');
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$data['tittle'] = 'Silabti - Tambah Mata Praktikum';
				$this->load->view('include/header', $data);
				$this->load->view('matprak/tambah_matprak');
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

	public function submit(){
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_matprak->insert();
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function delete($id_matprak)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_matprak->delete($id_matprak);
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function edit($id_matprak)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$data['matprak'] = $this->M_matprak->get_row($id_matprak);
				$data['tittle'] = 'Silabti - Edit Mata Praktikum';
				$this->load->view('include/header', $data);
				$this->load->view('matprak/edit_matprak', $data);
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
				$this->M_matprak->submit_edit();
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

/* End of file matprak.php */
/* Location: ./application/Controllers/matprak.php */