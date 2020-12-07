<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asisten extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
		$this->load->model('M_asisten');
	}

	public function index()
	{
		// $this->load->library('encryption');
  //       echo $this->encryption->encrypt('XXX.XX.XXXXX.X');die;
		if ($this->session->userdata('login') == 1) {
			$this->load->library('encryption');
			$data['tittle'] = 'Silabti - List Asisten';
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff" ){
				$data['list_asisten'] = $this->M_asisten->get_all();
			}else{
				$data['list_asisten'] = $this->M_asisten->get_all_asisten();
			}
			$this->load->view('include/header', $data);
			$this->load->view('asisten/list_asisten');
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
				$data['tittle'] = 'Silabti - Tambah Asisten';
				$this->load->view('include/header', $data);
				$this->load->view('asisten/tambah_asisten');
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

	public function submit()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_asisten->insert();
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function delete($id_user)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->M_asisten->delete($id_user);
			}
			else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function edit($id_user)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "AT (Editor)") {
				$this->load->library('encryption');
				$data['asisten'] = $this->M_asisten->get_row($id_user);
				$data['tittle'] = 'Silabti - Edit Asisten';
				$this->load->view('include/header', $data);
				$this->load->view('asisten/edit_asisten');
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
				$this->M_asisten->submit_edit();
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

/* End of file asisten.php */
/* Location: ./application/controllers/asisten.php */