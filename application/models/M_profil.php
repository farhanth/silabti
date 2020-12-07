<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	function get_profil($npm)
	{
		return $this->db->get_where('user', ['npm' => $npm])->row_array();
	}

	function get_jadwal_pj($npm)
	{
		$this->db->where('npm =', $npm);
		$this->db->where('role =', "PJ");
		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$this->db->order_by('tingkat', 'ASC');
		return $this->db->get()->result_array();
	}

	function get_jadwal_asisten($npm)
	{
		$this->db->where('npm =', $npm);
		$this->db->where('role =', "Asisten");
		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$this->db->order_by('tingkat', 'ASC');
		return $this->db->get()->result_array();
	}

	function update_profil($gambar)
	{
		$data = array(
			'gambar_profil' => $gambar
		);
		$this->db->where('npm', $this->input->post('npm_profil'));
		$this->db->update('user', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_profil', 'berhasil');
			$this->session->set_userdata('gambar_profil', $gambar);
			$deskripsi_log = "User ".$this->session->userdata('npm')." telah mengganti foto profilnya.";
			logger("Profil", "Mengubah", $deskripsi_log);
		}
	}

	function get_log($npm)
	{
		$this->db->select('*');
		$this->db->from('log');
		$this->db->join('user','user.id_user = log.user');
		$this->db->where('npm =', $npm);
		$this->db->order_by('id_log',"desc");
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}
}

/* End of file M_profile.php */
/* Location: ./application/Models/M_profile.php */