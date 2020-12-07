<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen_action extends CI_Model {
	function cek_konfig_konstanta_mhs()
	{
		return $this->db->get_where('konfigurasi_konstanta_mhs', ['id_konfigurasi_konstanta_mhs' => "1"])->row_array();
	}

	function cek_variabel_mhs()
	{
		return $this->db->get_where('variabel_mhs', ['id_variabel_mhs' => "1"])->row_array();
	}

	function submit_absen()
	{
		$konstanta_mhs = $this->db->get_where('konfigurasi_konstanta_mhs', ['id_konfigurasi_konstanta_mhs' => "1"])->row_array();
		$variabel_mhs = $this->db->get_where('variabel_mhs', ['id_variabel_mhs' => "1"])->row_array();

		//insert pj
		//cek shift
		if ($this->input->post('shift') > 4) {
			$kategori_shift = "Malam";
		}else{
			$kategori_shift = "Pagi";
		}

		//cek lab tingkat
		$tingkat = substr($this->input->post('kelas'), 0,1);
		if ($tingkat == 1 || $tingkat == 2) {
			$lab_tingkat_rekap = "Dasar";
		} else if ($tingkat == 3) {
			$lab_tingkat_rekap = "Menengah";
		} else{
			$lab_tingkat_rekap = "Lanjut";
		}

		//cek diganti/tidak
		if ($this->input->post('pengganti_pj') == NULL) {
			$nama_asisten_rekap = $this->input->post('pj');
		}else{
			$nama_asisten_rekap = $this->input->post('pengganti_pj');
		}
		$user = $this->db->get_where('user', ['nama_lengkap' => $nama_asisten_rekap])->row_array();

		//cek konfigurasi rekap dan dapatkan nilai rekap
		if ($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Aktif") {
			$variabel_mhs_rekap = $konstanta_mhs['konstanta_mhs'] + 1;
		} else{
			$variabel_pembagi = $variabel_mhs['variabel_mhs'];
			$variabel_mhs_rekap = max($this->input->post('baris_asisten')) / $variabel_pembagi ;
			if (number_format($variabel_mhs_rekap) == 0) {
				$variabel_mhs_rekap = 1;
			}
			$variabel_mhs_rekap = number_format($variabel_mhs_rekap) + 1;
		}

		$nilai_rekap = number_format($variabel_mhs_rekap) * 2;

		$data = [
			'waktu_praktikum' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'ruang_rekap' => $this->input->post('ruang'),
			'shift_rekap' => $this->input->post('shift'),
			'kategori_shift_rekap' => $kategori_shift,
			'kelas_rekap' => strtoupper($this->input->post('kelas')),
			'matprak_rekap' => $this->input->post('materi'), 
			'lab_tingkat_rekap' => $lab_tingkat_rekap,
			'nama_asisten_rekap' => $nama_asisten_rekap,
			'role_rekap' => "PJ",
			'variabel_mhs_rekap' => $variabel_mhs_rekap,
			'nilai_rekap' => $nilai_rekap,
			'at_rekap' => $this->session->userdata('nama_lengkap')
		];
		$this->db->insert('rekap_absen', $data);
		if ($this->db->affected_rows() > 0) {
			$deskripsi_log = "Penanggung Jawab ".$this->input->post('materi')." (".strtoupper($this->input->post('kelas')).") "."Shift ".$this->input->post('shift')."<br>Penanggung Jawab Absen : ".$this->session->userdata('nama_lengkap');
			logger_absen($user['id_user'], "Absen Asisten", "PJ", $deskripsi_log);
		}

		//insert asisten
		$field_asist_array = $this->input->post('asist');
		$field_pengganti_asist_array = $this->input->post('pengganti_asist');
		$field_baris_asisten_array = $this->input->post('baris_asisten');

		for ($i=0; $i < count($field_baris_asisten_array); $i++) { 
			//cek shift
			if ($this->input->post('shift') > 4) {
				$kategori_shift = "Malam";
			}else{
				$kategori_shift = "Pagi";
			}

			//cek lab tingkat
			$tingkat = substr($this->input->post('kelas'), 0,1);
			if ($tingkat == 1 || $tingkat == 2) {
				$lab_tingkat_rekap = "Dasar";
			} else if ($tingkat == 3) {
				$lab_tingkat_rekap = "Menengah";
			} else{
				$lab_tingkat_rekap = "Lanjut";
			}

			//cek diganti/tidak
			if ($field_pengganti_asist_array[$i] == NULL) {
				$nama_asisten_rekap = $field_asist_array[$i];
			}else{
				$nama_asisten_rekap = $field_pengganti_asist_array[$i];
			}
			$user = $this->db->get_where('user', ['nama_lengkap' => $nama_asisten_rekap])->row_array();

			//cek konfigurasi rekap dan dapatkan nilai rekap
			if ($konstanta_mhs['konfigurasi_konstanta_mhs'] == "Aktif") {
				$variabel_mhs_rekap = $konstanta_mhs['konstanta_mhs'];
			} else{
				$variabel_pembagi = $variabel_mhs['variabel_mhs'];
				$variabel_mhs_rekap = $field_baris_asisten_array[$i] / $variabel_pembagi ;
				if (number_format($variabel_mhs_rekap) == 0) {
					$variabel_mhs_rekap = 1;
				}
				$variabel_mhs_rekap = number_format($variabel_mhs_rekap);
			}

			$nilai_rekap = number_format($variabel_mhs_rekap) * 2;

			$data = [
				'waktu_praktikum' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
				'ruang_rekap' => $this->input->post('ruang'),
				'shift_rekap' => $this->input->post('shift'),
				'kategori_shift_rekap' => $kategori_shift,
				'kelas_rekap' => strtoupper($this->input->post('kelas')),
				'matprak_rekap' => $this->input->post('materi'), 
				'lab_tingkat_rekap' => $lab_tingkat_rekap,
				'nama_asisten_rekap' => $nama_asisten_rekap,
				'role_rekap' => "Asisten",
				'jumlah_mhs_rekap' => $field_baris_asisten_array[$i],
				'variabel_mhs_rekap' => $variabel_mhs_rekap,
				'nilai_rekap' => $nilai_rekap,
				'at_rekap' => $this->session->userdata('nama_lengkap')
			];
			$this->db->insert('rekap_absen', $data);
			if ($this->db->affected_rows() > 0) {
				$deskripsi_log = "Asisten ".$this->input->post('materi')." (".strtoupper($this->input->post('kelas')).") "."Shift ".$this->input->post('shift')."<br>Penanggung Jawab Absen : ".$this->session->userdata('nama_lengkap');
				logger_absen($user['id_user'], "Absen Asisten", "Asisten", $deskripsi_log);
			}
		}

		$this->session->set_flashdata('message_rekap_absen', 'Disimpan');
		redirect($this->input->post('redirect') ,'refresh');
	}
}

/* End of file M_absen_action.php */
/* Location: ./application/Models/M_absen_action.php */