<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi_rekap extends CI_Model {
	function get_gaji_perjam()
	{
		$array_tingkat = ['"Dasar"', '"Menengah"', '"Lanjut"'];
		$order_tingkat = sprintf('FIELD(lab_tingkat, %s)', implode(', ', $array_tingkat));
		$this->db->order_by($order_tingkat);
		$this->db->order_by('role', 'desc');
		$this->db->order_by('kategori_shift', 'desc');
		return $this->db->get('gaji_perjam')->result_array();
	}
	
	function get_row_gaji_perjam($id_gaji_perjam)
	{
		return $this->db->get_where('gaji_perjam', ['id_gaji_perjam' => $id_gaji_perjam])->row_array();
	}

	function submit_edit_gaji()
	{
		$target = $this->db->get_where('gaji_perjam', ['id_gaji_perjam' => $this->input->post('id_gaji_perjam')])->row_array();
		$data = [
			'gaji_perjam' => $this->input->post('gaji_perjam'),
			'variabel1' => $this->input->post('variabel1'),
			'variabel2' => $this->input->post('variabel2')
		];
		$this->db->where('id_gaji_perjam', $this->input->post('id_gaji_perjam'));
    	$this->db->update('gaji_perjam', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_gaji-perjam', 'Gaji Per Jam Berhasil Diubah');
			$deskripsi_log = "Gaji Per Jam Lab ".$target['lab_tingkat']." (".$target['role']." ".$target['kategori_shift'].")"." telah diubah.";
			logger("Konfigurasi Rekap", "Mengubah", $deskripsi_log);
			redirect('konfigurasi_rekap/gaji','refresh');
		}
	}

	function get_variabel_mhs()
	{
		return $this->db->get_where('variabel_mhs', ['id_variabel_mhs' => "1"])->row_array();
	}

	function submit_edit_variabel_mhs()
	{
		$data = [
			'variabel_mhs' => $this->input->post('variabel_mhs')
		];
		$this->db->where('id_variabel_mhs', "1");
    	$this->db->update('variabel_mhs', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_variabel-mhs', 'Nilai Variabel Mahasiswa Berhasil Diubah');
			$deskripsi_log = "Variabel Nilai Mahasiswa telah diubah menjadi ".$this->input->post('variabel_mhs');
			logger("Konfigurasi Rekap", "Mengubah", $deskripsi_log);
			redirect('konfigurasi_rekap','refresh');
		}
	}

	function get_konstanta_mhs()
	{
		return $this->db->get_where('konfigurasi_konstanta_mhs', ['id_konfigurasi_konstanta_mhs' => "1"])->row_array();
	}

	function submit_edit_konstanta_mhs()
	{
		$data = [
			'konfigurasi_konstanta_mhs' => $this->input->post('konfigurasi_konstanta_mhs'),
			'konstanta_mhs' => $this->input->post('konstanta_mhs')
		];
		$this->db->where('id_konfigurasi_konstanta_mhs', "1");
    	$this->db->update('konfigurasi_konstanta_mhs', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_konstanta-mhs', 'Konfigurasi Konstanta Mahasiswa Berhasil Diubah');
			if ($this->input->post('konfigurasi_konstanta_mhs') == "Aktif") {
				$deskripsi_log = "Konfigurasi Mahasiswa telah diubah menjadi ".$this->input->post('konfigurasi_konstanta_mhs')." dengan nilai ".$this->input->post('konstanta_mhs');
			} else{
				$deskripsi_log = "Konfigurasi Mahasiswa telah diubah menjadi ".$this->input->post('konfigurasi_konstanta_mhs');
			}
			logger("Konfigurasi Rekap", "Mengubah", $deskripsi_log);
			redirect('konfigurasi_rekap','refresh');
		}
	}
}

/* End of file M_konfigurasi_rekap.php */
/* Location: ./application/Models/M_konfigurasi_rekap.php */