<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			if ($this->session->userdata('jabatan') == "Administrator") {
				$data['tittle'] = 'Silabti - Log Aktifitas Website';
				$this->load->view('include/header', $data);
				$this->load->view('konfigurasi/log');
				$this->load->view('include/footer');
			}else{
				redirect('error_404');
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

}

/* End of file log.php */
/* Location: ./application/config/log.php */