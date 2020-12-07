<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_rekap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_list_rekap');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$ruang = NULL;
				if (isset($_POST['ruang'])) {
	                $ruang = $this->input->post('ruang');
	            }
				$data['tittle'] = 'Silabti - List Rekap Absen';
				$data['rekap'] = $this->M_list_rekap->get_all($ruang);
				$data['ruang_selected'] = $ruang;
				$data['ruang_opt'] = $this->M_list_rekap->get_ruang_opt();
	            if (isset($_POST['edit'])) {
	                $this->_edit_list($this->input->post('edit'));
	            }
	            else{
	            	if (isset($_POST['delete'])) {
		                $this->_delete_list($this->input->post('delete'));
		            }
	            	$this->load->view('include/header', $data);
					$this->load->view('rekap/list_rekap_all');
					$this->load->view('include/footer');
	            }
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	private function _delete_list($id_rekap)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$this->M_list_rekap->delete($id_rekap);
				redirect('list_rekap','refresh');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	private function _edit_list($id_rekap)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Staff") {
				$this->load->library('user_agent');
				$data['tittle'] = 'Silabti - Edit Rekap Absen';
				$data['absen'] = $this->M_list_rekap->get_row($id_rekap);
				$data['asisten_opt'] = $this->M_list_rekap->get_asisten_opt();
				$this->load->view('include/header', $data);
				$this->load->view('rekap/edit_rekap');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function rekap($ruang, $shift)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$data['tittle'] = 'Silabti - List Rekap Absen';
				$data['ruang'] = $ruang;
				$data['shift'] = $shift[0];
				$data['pj'] = $this->M_list_rekap->pj_rekap_ruang($ruang, $shift[0]);
				$data['asisten'] = $this->M_list_rekap->asisten_rekap_ruang($ruang, $shift[0]);
				if (isset($_POST['edit'])) {
	                $this->_edit($this->input->post('edit'));
	            }
	            else{
	            	if (isset($_POST['delete'])) {
		                $this->_delete($this->input->post('delete'));
		            }
					$this->load->view('include/header', $data);
					$this->load->view('rekap/list_rekap');
					$this->load->view('include/footer');
	            }
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	public function submit_edit_rekap()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$this->M_list_rekap->submit_edit_rekap();
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	private function _edit($id_rekap)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$this->load->library('user_agent');
				$data['tittle'] = 'Silabti - Edit Rekap Absen';
				$data['absen'] = $this->M_list_rekap->get_row($id_rekap);
				$data['asisten_opt'] = $this->M_list_rekap->get_asisten_opt();
				$this->load->view('include/header', $data);
				$this->load->view('rekap/edit_rekap');
				$this->load->view('include/footer');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

	private function _delete($id_rekap)
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff") {
				$rekap = $this->db->get_where('rekap_absen', ['id_rekap' => $id_rekap])->row_array();
				$this->M_list_rekap->delete($id_rekap);
				redirect('list_rekap/rekap/'.$rekap['ruang_rekap'].'/'.$rekap['shift_rekap'],'refresh');
			}else{
				show_404();
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}
}

/* End of file List_rekap.php */
/* Location: ./application/Controllers/List_rekap.php */