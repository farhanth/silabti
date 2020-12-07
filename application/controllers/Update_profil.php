<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profil');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 1){
			$this->load->library('upload');
			$config['upload_path'] = 'gambar_profil';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '5000';
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = $this->input->post('npm_profil')."_";

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('update_gambar_profile')) {
				echo $this->upload->display_errors();
			} else {
				$gambar = $this->upload->data('file_name');
				$this->M_profil->update_profil($gambar);
				header('Cache-Control: no-store, no-cache, must-revalidate');
				header('Cache-Control: post-check=0, pre-check=0', false);
				header('Pragma: no-cache');
				redirect('profil/'.$this->session->userdata('npm'));
			}
		} elseif ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('message_login', 'tidak_login');
			redirect('login');
		}
	}

}

/* End of file Update_profil.php */
/* Location: ./application/Controllers/Update_profil.php */