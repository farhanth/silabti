<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	function get_all($ruang)
	{
		$this->db->select('*');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		if ($ruang != NULL) {
			$this->db->where('ruang =', $ruang);
		}
		$array_hari = ['"Senin"', '"Selasa"', '"Rabu"', '"Kamis"', '"Jumat"', '"Sabtu"'];
		$order_hari = sprintf('FIELD(hari, %s)', implode(', ', $array_hari));
		$this->db->order_by($order_hari);
		$this->db->order_by('kelas_jadwal', 'ASC');
		$this->db->order_by('jadwal.id_matprak', 'ASC');
		return $this->db->get()->result_array();
	}

	function get_ruang_opt()
	{
		$this->db->distinct();
		$this->db->select('ruang');
		$this->db->from('jadwal');		
		$this->db->join('matprak','matprak.id_matprak = jadwal.id_matprak');
		$this->db->join('user','user.id_user = jadwal.id_user');
		$this->db->order_by('ruang', 'ASC');
		return $this->db->get()->result_array();
	}

	function get_matprak_opt()
	{
		$this->db->where('semester =', $this->session->userdata('semester'));
		$this->db->order_by('semester DESC, tingkat ASC, matprak ASC');
		return $this->db->get('matprak')->result_array();
	}

	function get_asisten_opt()
	{
		$this->db->where_not_in('kelas', '');
		$this->db->where('jabatan =', "Asisten");
		$this->db->or_where('jabatan =', "Asisten Tetap");
		$this->db->or_where('jabatan =', "AT (Editor)");
		$this->db->order_by('nama_lengkap', 'ASC');
		return $this->db->get('user')->result_array();
	}

	function get_row($id_jadwal)
	{
		return $this->db->get_where('jadwal', ['id_jadwal' => $id_jadwal])->row_array();
	}

	function insert()
	{
		//insert pj
		$user = $this->db->get_where('user', ['id_user' => $this->input->post('pj')])->row_array();
		$matprak = $this->db->get_where('matprak', ['id_matprak' => $this->input->post('matprak')])->row_array();
		$data = [
			'hari' => $this->input->post('hari'),
			'kelas_jadwal' => strtoupper($this->input->post('kelas')),
			'id_matprak' => $this->input->post('matprak'),
			'ruang' => $this->input->post('ruang'),
			'shift' => $this->input->post('shift'),
			'id_user' => $this->input->post('pj'),
			'role' => 'PJ'
		];
		$this->db->insert('jadwal', $data);
		if ($this->db->affected_rows() > 0) {
			$deskripsi_log = "Jadwal ".$user['nama_lengkap']." mata praktikum ".$matprak['matprak']." di ruang ".$this->input->post('ruang')." shift ".$this->input->post('shift')." telah ditambah.";
			logger("Jadwal", "Menambah", $deskripsi_log);
		}

		//insert asisten
		$field_asisten_array = $this->input->post('asisten');
		foreach($field_asisten_array as $asisten){
			$user = $this->db->get_where('user', ['id_user' => $asisten])->row_array();
			$matprak = $this->db->get_where('matprak', ['id_matprak' => $this->input->post('matprak')])->row_array();
			$data = [
				'hari' => $this->input->post('hari'),
				'kelas_jadwal' => strtoupper($this->input->post('kelas')),
				'id_matprak' => $this->input->post('matprak'),
				'ruang' => $this->input->post('ruang'),
				'shift' => $this->input->post('shift'),
				'id_user' => $asisten,
				'role' => 'Asisten'
			];
			$this->db->insert('jadwal', $data);
			if ($this->db->affected_rows() > 0) {
				$deskripsi_log = "Jadwal ".$user['nama_lengkap']." mata praktikum ".$matprak['matprak']." di ruang ".$this->input->post('ruang')." shift ".$this->input->post('shift')." telah ditambah.";
				logger("Jadwal", "Menambah", $deskripsi_log);
			}
		}
		$this->session->set_flashdata('message_jadwal', 'Ditambah');
		redirect('jadwal/pengaturan','refresh');
	}

	function delete($id_jadwal)
	{
		$jadwal = $this->db->get_where('jadwal', ['id_jadwal' => $id_jadwal])->row_array();
		$id_asisten = $jadwal['id_user'];
		$id_matprak = $jadwal['id_matprak'];
		$user = $this->db->get_where('user', ['id_user' => $id_asisten])->row_array();
		$matprak = $this->db->get_where('matprak', ['id_matprak' => $id_matprak])->row_array();
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->delete('jadwal');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_jadwal', 'Dihapus');
			$deskripsi_log = "Jadwal ".$user['nama_lengkap']." mata praktikum ".$matprak['matprak']." di ruang ".$jadwal['ruang']." shift ".$jadwal['shift']." telah dihapus.";
			logger("Jadwal", "Menghapus", $deskripsi_log);
			redirect('jadwal/pengaturan','refresh');
		}
	}

	function submit_edit()
	{
		$user = $this->db->get_where('user', ['id_user' => $this->input->post('asisten')])->row_array();
		$matprak = $this->db->get_where('matprak', ['id_matprak' => $this->input->post('matprak')])->row_array();
		$data = [
			'hari' => $this->input->post('hari'),
			'kelas_jadwal' => strtoupper($this->input->post('kelas')),
			'id_matprak' => $this->input->post('matprak'),
			'id_user' => $this->input->post('asisten'),
			'role' => $this->input->post('role'),
			'ruang' => $this->input->post('ruang'),
			'shift' => $this->input->post('shift')
		];
		$this->db->where('id_jadwal', $this->input->post('id_jadwal'));
    	$this->db->update('jadwal', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_jadwal', 'Diubah');
			$deskripsi_log = "Jadwal ".$user['nama_lengkap']." mata praktikum ".$matprak['matprak']." di ruang ".$this->input->post('ruang')." shift ".$this->input->post('shift')." telah diubah.";
			logger("Jadwal", "Mengubah", $deskripsi_log);
			redirect('jadwal/pengaturan','refresh');
		}
	}

	function cari($keyword)
	{
		$this->db->like('nama_lengkap', $keyword);
		$this->db->or_like('jadwal.kelas_jadwal', $keyword);
		$this->db->or_like('matprak', $keyword);
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
}

/* End of file M_jadwal.php */
/* Location: ./application/Models/M_jadwal.php */