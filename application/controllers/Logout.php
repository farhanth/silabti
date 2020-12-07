<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		session_destroy();
		redirect('','refresh');
	}

}

/* End of file Logout.php */
/* Location: ./application/Controllers/Logout.php */