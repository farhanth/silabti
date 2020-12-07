<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logger extends CI_Model {

	function save_log($data)
	{
		$this->db->insert('log', $data);
	}

}

/* End of file M_logger.php */
/* Location: ./application/Models/M_logger.php */