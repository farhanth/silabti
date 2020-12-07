<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	function jadwal($keyword)
	{
		$this->db->where('nama_lengkap', $keyword);
		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$array_hari = ['"Senin"', '"Selasa"', '"Rabu"', '"Kamis"', '"Jumat"', '"Sabtu"'];
		$order_hari = sprintf('FIELD(hari, %s)', implode(', ', $array_hari));
		$this->db->order_by($order_hari);
		$this->db->order_by('kelas_jadwal', 'ASC');
		$this->db->order_by('jadwal.id_matprak', 'ASC');
		return $this->db->get()->result_array();
	}

	function rekap($keyword)
	{
		$this->db->where('nama_asisten_rekap', $keyword);
		$this->db->order_by('waktu_praktikum', 'DESC');
		$this->db->order_by('matprak_rekap', 'ASC');
		$this->db->order_by('shift_rekap', 'ASC');
		return $this->db->get('rekap_absen')->result_array();
	}

	// function rekap_periode($keyword)
	// {
	// 	$semester = $this->session->userdata('semester');
	// 	$tahun_awal = $this->session->userdata('tahun_awal');
	// 	$tahun_akhir = $this->session->userdata('tahun_akhir');
	// 	$test = $tahun_akhir.'-05';
	// 	$this->db->where('nama_asisten_rekap', $keyword);
	// 	$this->db->where("DATE_FORMAT(waktu_praktikum,'%Y-%m')", $test);
	// 	return $this->db->get('rekap_absen')->result_array();
	// }

	function log($id_keyword)
	{
		$this->db->order_by('waktu', 'DESC');
		return $this->db->get_where('log', ['user' => $id_keyword])->result_array();
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/Models/M_dashboard.php */