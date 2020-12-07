<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen extends CI_Model {
	function get_asisten_opt()
	{
		$this->db->where_not_in('kelas', '');
		$this->db->where('jabatan =', "Asisten");
		$this->db->or_where('jabatan =', "Asisten Tetap");
		$this->db->or_where('jabatan =', "AT (Editor)");
		$this->db->order_by('nama_lengkap', 'ASC');
		return $this->db->get('user')->result_array();
	}

	function get_matprak_opt()
	{
		$this->db->where('semester =', $this->session->userdata('semester'));
		$this->db->order_by('semester DESC, tingkat ASC, matprak ASC');
		return $this->db->get('matprak')->result_array();
	}

	function cek_rekap($ruang, $shift)
	{
		// $datestring = '%N';
		// $time = time();
		// $iso_hari = mdate($datestring, $time);

		// if ($iso_hari == 1) {
		// 	$hari = "Senin";
		// } elseif ($iso_hari == 2) {
		// 	$hari = "Selasa";
		// }elseif ($iso_hari == 3) {
		// 	$hari = "Rabu";
		// }elseif ($iso_hari == 4) {
		// 	$hari = "Kamis";
		// }elseif ($iso_hari == 5) {
		// 	$hari = "Jumat";
		// }elseif ($iso_hari == 6) {
		// 	$hari = "Sabtu";
		// } else{
		// 	$hari = "Minggu";
		// }

		// $this->db->select('*');
		// $this->db->from('jadwal');		
		// $this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		// $this->db->join('user','user.id_user = jadwal.id_user');
		// $this->db->where('role =', 'PJ');
		// $this->db->where('hari =', $hari);
		// $this->db->where('ruang =', $ruang);
		// $this->db->where('shift =', $shift);
		// $this->db->where('berlangsung =', 'Iya');
		// $pj = $this->db->get()->row_array();
		
		// $jadwal_aktif = $pj['matprak'];
		$datestring = '%Y-%m-%d';
		$time = time();
		$tanggal_sekarang = mdate($datestring, $time);

		$this->db->distinct();
		$this->db->select('kelas_rekap, at_rekap');
		$this->db->from('rekap_absen');		
		$this->db->like('waktu_praktikum', $tanggal_sekarang);
		$this->db->where('ruang_rekap =', $ruang);
		$this->db->where('shift_rekap =', $shift);
		// $this->db->where('matprak_rekap =', $jadwal_aktif);
		return $this->db->get()->result_array();
	}

	function get_jadwal_pj($ruang, $shift)
	{
		$datestring = '%N';
		$time = time();
		$iso_hari = mdate($datestring, $time);

		if ($iso_hari == 1) {
			$hari = "Senin";
		} elseif ($iso_hari == 2) {
			$hari = "Selasa";
		}elseif ($iso_hari == 3) {
			$hari = "Rabu";
		}elseif ($iso_hari == 4) {
			$hari = "Kamis";
		}elseif ($iso_hari == 5) {
			$hari = "Jumat";
		}elseif ($iso_hari == 6) {
			$hari = "Sabtu";
		} else{
			$hari = "Minggu";
		}

		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$this->db->where('role =', 'PJ');
		$this->db->where('hari =', $hari);
		$this->db->where('ruang =', $ruang);
		$this->db->where('shift =', $shift);
		$this->db->where('berlangsung =', 'Iya');
		return $this->db->get()->result_array();
	}
	
	function get_jadwal_asisten($ruang, $shift)
	{
		$datestring = '%N';
		$time = time();
		$iso_hari = mdate($datestring, $time);

		if ($iso_hari == 1) {
			$hari = "Senin";
		} elseif ($iso_hari == 2) {
			$hari = "Selasa";
		}elseif ($iso_hari == 3) {
			$hari = "Rabu";
		}elseif ($iso_hari == 4) {
			$hari = "Kamis";
		}elseif ($iso_hari == 5) {
			$hari = "Jumat";
		}elseif ($iso_hari == 6) {
			$hari = "Sabtu";
		}
		else{
			$hari = "Minggu";
		}

		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$this->db->where('role =', 'Asisten');
		$this->db->where('hari =', $hari);
		$this->db->where('ruang =', $ruang);
		$this->db->where('shift =', $shift);
		$this->db->where('berlangsung =', 'Iya');
		$this->db->order_by('nama_lengkap', 'asc');
		return $this->db->get()->result_array();
	}
}

/* End of file M_absen.php */
/* Location: ./application/Models/M_absen.php */