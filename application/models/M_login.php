<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	function recent_login($id_user)
	{
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$datestring = '%Y-%m-%d %H:%i:%s';
		$time = time();
		$now = mdate($datestring, $time);

		$data = [
			'last_login' => $now,
		];
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	function get_profile($npm)
	{
		return $this->db->get_where('user', ['npm' => $npm])->row_array();
	}

	function get_konfig_semester()
	{
		return $this->db->get_where('konfigurasi_semester', ['id_konfig_semester' => "1"])->row_array();
	}
}

/* End of file M_login.php */
/* Location: ./application/Models/M_login.php */