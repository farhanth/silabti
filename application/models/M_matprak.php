<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matprak extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//here
	}
	
	function get_all_matprak()
	{
		$this->db->order_by('id_matprak', 'ASC');
		return $this->db->get('matprak')->result_array();
	}

	function get_row($id_matprak)
	{
		return $this->db->get_where('matprak', ['id_matprak' => $id_matprak])->row_array();
	}

	function insert()
	{
		$data = [
			'matprak' => ucwords($this->input->post('matprak')),
			'matprak_singkat' => strtoupper($this->input->post('matprak_singkat')),
			'semester' => $this->input->post('semester'),
			'tingkat' => $this->input->post('tingkat'),
			'periode' => $this->input->post('periode'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'berlangsung' => $this->input->post('berlangsung')
		];
		$this->db->insert('matprak', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_matprak', 'Ditambah');
			$deskripsi_log = "Matprak ".ucwords($this->input->post('matprak'))." telah ditambahkan.";
			logger("Mata Praktikum", "Menambah", $deskripsi_log);
			redirect('matprak','refresh');
		}
	}

	function delete($id_matprak)
	{
		$matprak = $this->db->get_where('matprak', ['id_matprak' => $id_matprak])->row_array();
		$this->db->where('id_matprak', $id_matprak);
		$this->db->delete('matprak');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_matprak', 'Dihapus');
			$deskripsi_log = "Matprak ".$matprak['matprak']." telah dihapus.";
			logger("Mata Praktikum", "Menghapus", $deskripsi_log);
			redirect('matprak','refresh');
		}
	}

	function submit_edit()
	{
		$data = [
			'matprak' => ucwords($this->input->post('matprak')),
			'matprak_singkat' => strtoupper($this->input->post('matprak_singkat')),
			'semester' => $this->input->post('semester'),
			'tingkat' => $this->input->post('tingkat'),
			'periode' => $this->input->post('periode'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'berlangsung' => $this->input->post('berlangsung')
		];
		$this->db->where('id_matprak', $this->input->post('id_matprak'));
    	$this->db->update('matprak', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_matprak', 'Diubah');
			$deskripsi_log = "Matprak ".ucwords($this->input->post('matprak'))." telah diubah.";
			logger("Mata Praktikum", "Mengubah", $deskripsi_log);
			redirect('matprak','refresh');
		}
	}
}

/* End of file M_matprak.php */
/* Location: ./application/Models/M_matprak.php */