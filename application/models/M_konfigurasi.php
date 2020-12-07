<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	function get_semester()
	{
		return $this->db->get_where('konfigurasi_semester', ['id_konfig_semester' => "1"])->row_array();
	}

	function set_semester()
	{
		$data = [
			'semester' => $this->input->post('semester'),
			'tahun_awal' => $this->input->post('tahun_awal'),
			'tahun_akhir' => $this->input->post('tahun_akhir'),
		];
		$this->db->where('id_konfig_semester', "1");
    	$this->db->update('konfigurasi_semester', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_semester', 'Konfigurasi Semester Berhasil Diubah');
			$deskripsi_log = "User ".$this->session->userdata('npm')." mengubah konfigurasi semester menjadi ".$this->input->post('semester')." ".$this->input->post('tahun_awal')."/".$this->input->post('tahun_akhir').".";
			logger("Konfigurasi Web", "Mengubah", $deskripsi_log);
			redirect('konfigurasi_web','refresh');
		}
	}

	function get_at_editor()
	{
		return $this->db->get_where('user', ['jabatan' => "AT (Editor)"])->row_array();
	}

	function set_at_editor()
	{
		if ($this->input->post("at_editor") == "Aktif") {
			$data = [
				'jabatan' => "AT (Editor)",
			];
			$this->db->where('jabatan', "Asisten Tetap");
	    	$this->db->update('user', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message_konfig_at', 'Konfigurasi Role Asisten Tetap Berhasil Diubah');
				$deskripsi_log = "User ".$this->session->userdata('npm')." mengubah konfigurasi role AT (Editor) menjadi ".$this->input->post("at_editor").".";
				logger("Konfigurasi Web", "Mengubah", $deskripsi_log);
				redirect('konfigurasi_web','refresh');
			}
		} else if ($this->input->post("at_editor") == "Tidak Aktif") {
			$data = [
				'jabatan' => "Asisten Tetap",
			];
			$this->db->where('jabatan', "AT (Editor)");
	    	$this->db->update('user', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message_konfig_at', 'Konfigurasi Role Asisten Tetap Berhasil Diubah');
				$deskripsi_log = "User ".$this->session->userdata('npm')." mengubah konfigurasi role AT (Editor) menjadi ".$this->input->post("at_editor").".";
				logger("Konfigurasi Web", "Mengubah", $deskripsi_log);
				redirect('konfigurasi_web','refresh');
			}
		}
	}

	function jadwalDrop()
	{
		$this->db->empty_table('jadwal'); 
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_jadwalDrop', 'Seluruh Data Jadwal Berhasil Dihapus');
			$deskripsi_log = "User ".$this->session->userdata('npm')." menghapus seluruh jadwal asisten.";
			logger("Konfigurasi Web", "Menghapus", $deskripsi_log);
			redirect('konfigurasi_web','refresh');
		}
	}

	function get_log()
	{
		$this->db->select('*');
		$this->db->from('log');
		$this->db->join('user','user.id_user = log.user');
		$this->db->order_by('waktu', 'DESC');
		return $this->db->get()->result_array();
	}

	function logDrop()
	{
		$this->db->empty_table('log'); 
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_konfig_logDrop', 'Seluruh Data Log Aktifitas Berhasil Dihapus');
			$deskripsi_log = "User ".$this->session->userdata('npm')." menghapus seluruh log aktifitas.";
			logger("Konfigurasi Web", "Menghapus", $deskripsi_log);
			redirect('konfigurasi_web','refresh');
		}
	}
}

/* End of file M_konfigurasi.php */
/* Location: ./application/Models/M_konfigurasi.php */