<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_list_rekap extends CI_Model {
	function get_all($ruang)
	{
		if ($ruang != NULL) {
			$this->db->where('ruang_rekap =', $ruang);
		}
		$this->db->order_by('waktu_praktikum', 'DESC');
		$this->db->order_by('matprak_rekap', 'ASC');
		$this->db->order_by('ruang_rekap', 'ASC');
		$this->db->order_by('shift_rekap', 'ASC');
		return $this->db->get('rekap_absen')->result_array();
	}

	function get_ruang_opt()
	{
		$this->db->distinct();
		$this->db->select('ruang_rekap');
		$this->db->from('rekap_absen');		
		$this->db->order_by('ruang_rekap', 'ASC');
		return $this->db->get()->result_array();
	}

	function pj_rekap_ruang($ruang, $shift)
	{
		$datestring = '%Y-%m-%d';
		$time = time();
		$tanggal_sekarang = mdate($datestring, $time);

		$this->db->select('*');
		$this->db->from('rekap_absen');		
		$this->db->like('waktu_praktikum', $tanggal_sekarang);
		$this->db->where('ruang_rekap =', $ruang);
		$this->db->where('shift_rekap =', $shift);
		$this->db->where('role_rekap =', 'PJ');
		return $this->db->get()->result_array();
	}

	function asisten_rekap_ruang($ruang, $shift)
	{
		$datestring = '%Y-%m-%d';
		$time = time();
		$tanggal_sekarang = mdate($datestring, $time);

		$this->db->select('*');
		$this->db->from('rekap_absen');		
		$this->db->like('waktu_praktikum', $tanggal_sekarang);
		$this->db->where('ruang_rekap =', $ruang);
		$this->db->where('shift_rekap =', $shift);
		$this->db->where('role_rekap =', 'Asisten');
		return $this->db->get()->result_array();
	}

	function get_row($id_rekap)
	{
		return $this->db->get_where('rekap_absen', ['id_rekap' => $id_rekap])->row_array();
	}

	function get_asisten_opt()
	{
		$this->db->where('jabatan =', "Asisten");
		$this->db->or_where('jabatan =', "Asisten Tetap");
		$this->db->or_where('jabatan =', "AT (Editor)");
		$this->db->order_by('nama_lengkap', 'ASC');
		return $this->db->get('user')->result_array();
	}

	function submit_edit_rekap()
	{
		$role = $this->session->userdata('jabatan');
		if ($role == "Staff") {
			$data = [
				'nama_asisten_rekap' => $this->input->post('asisten'),
				'role_rekap' => $this->input->post('role'),
				'jumlah_mhs_rekap' => $this->input->post('baris_asisten'),
				'variabel_mhs_rekap' => $this->input->post('variabel_mhs'),
				'nilai_rekap' => $this->input->post('nilai_rekap')
			];
		} else{
			$data = [
				'nama_asisten_rekap' => $this->input->post('asisten'),
				'role_rekap' => $this->input->post('role'),
				'jumlah_mhs_rekap' => $this->input->post('baris_asisten'),
			];
		}
		$this->db->where('id_rekap', $this->input->post('id_rekap'));
    	$this->db->update('rekap_absen', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_rekap_harian', 'Diubah');
			$deskripsi_log = "Rekap absen dengan ID ".$this->input->post('id_rekap')." telah diubah.";
			logger("Rekap Absen", "Mengubah", $deskripsi_log);
			redirect($this->input->post('redirect'),'refresh');
		}
	}

	function delete($id_rekap)
	{
		$this->db->where('id_rekap', $id_rekap);
		$this->db->delete('rekap_absen');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_rekap_harian', 'Dihapus');
			$deskripsi_log = "Rekap absen dengan ID ".$id_rekap." telah dihapus.";
			logger("Rekap Absen", "Menghapus", $deskripsi_log);
		}
	}
}

/* End of file M_list_rekap.php */
/* Location: ./application/Models/M_list_rekap.php */