<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_rekap extends CI_Model {
	function get_data_dasar($tanggal_awal, $tanggal_akhir)
	{
		$this->db->where('waktu_praktikum >=', date('Y-m-d', strtotime($tanggal_awal)));
		$this->db->where('waktu_praktikum <=', date('Y-m-d', strtotime($tanggal_akhir)));
		$this->db->where('lab_tingkat_rekap =', 'Dasar');
		return $this->db->get('rekap_absen')->result_array();
	}

	function get_data_menengah_lanjut($tanggal_awal, $tanggal_akhir)
	{
		$lab_tingkat = "Lanjut,Menengah";
		// $this->db->where('waktu_praktikum <=', date('Y-m-d', strtotime($tanggal_akhir. ' +1 day')));
		$this->db->where('waktu_praktikum >=', date('Y-m-d', strtotime($tanggal_awal)));
		$this->db->where('waktu_praktikum <=', date('Y-m-d', strtotime($tanggal_akhir)));
		$this->db->where_in('lab_tingkat_rekap', explode(',', $lab_tingkat));
		// $this->db->where('lab_tingkat_rekap =', 'Lanjut');
		// $this->db->where_in('lab_tingkat_rekap', 'Menengah');
		// $this->db->where_in('lab_tingkat_rekap', 'Lanjut');
		return $this->db->get('rekap_absen')->result_array();
	}
	

	function get_asisten()
	{
		$this->db->where('jabatan =', 'Asisten');
		$this->db->or_where('jabatan =', 'Asisten Tetap');
		$this->db->or_where('jabatan =', 'AT (Editor)');
		$this->db->order_by('nama_lengkap', 'ASC');
		return $this->db->get('user')->result_array();
	}

	function get_honor()
	{
		return $this->db->get('gaji_perjam')->result_array();
	}
}

/* End of file M_laporan_rekap.php */
/* Location: ./application/Models/M_laporan_rekap.php */