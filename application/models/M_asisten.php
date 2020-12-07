<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_asisten extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
	}

	function get_all()
	{
		$this->db->order_by('id_user', 'ASC');
		$this->db->where_not_in('jabatan', 'Administrator');
		return $this->db->get('user')->result_array();
	}

	function get_all_asisten()
	{
		$where_kelas = "kelas is  NOT NULL";
		$this->db->order_by('id_user', 'ASC');
		$this->db->where_not_in('kelas', '');
		// $this->db->where_not_in('jabatan', 'Administrator');
		$this->db->where('jabatan', 'Asisten');
		$this->db->or_where('jabatan', 'Asisten Tetap');
		$this->db->or_where('jabatan', 'AT (Editor)');
		return $this->db->get('user')->result_array();
	}

	function get_row($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
	}
	
	function insert()
	{
		$cek_npm = $this->db->get_where('user', ['npm' => $this->input->post('npm')])->row_array();

		if($cek_npm){
			$this->session->set_flashdata('message_asisten', 'Gagal Ditambah');
			redirect('asisten/tambah','refresh');
		}else{
			if (isset($_POST['force_password'])) {
				$ganti_password = "Iya";
			}else{
				$ganti_password = "Tidak";
			}

			$this->load->library('encryption');
			$no_tlp = $this->input->post('no_tlp');
			$no_rek = $this->input->post('no_rek');
			$gambar_profil = $this->input->post('jk');
			if ($gambar_profil === "Laki laki") {
				$gambar_profil = "male.jpg";
			} else{
				$gambar_profil = "female.jpg";
			}
			$data = [
				'npm' => $this->input->post('npm'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'kelas' => strtoupper($this->input->post('kelas')),
				'jk' => $this->input->post('jk'),
				'no_tlp' => $this->encryption->encrypt($no_tlp),
				'no_rek' => $this->encryption->encrypt($no_rek),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'ganti_password' => $ganti_password,
				'jabatan' => $this->input->post('jabatan'),
				'gambar_profil' => $gambar_profil
			];
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message_asisten', 'Ditambah');
				$deskripsi_log = "User ".$this->input->post('npm')." telah dibuat.";
				logger("Asisten", "Membuat", $deskripsi_log);
				redirect('asisten','refresh');
			}
		}
	}

	function delete($id_user)
	{
		$user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message_asisten', 'Dihapus');
			$deskripsi_log = "User ".$user['npm']." telah dihapus.";
			logger("Asisten", "Menghapus", $deskripsi_log);
			redirect('asisten','refresh');
		}
	}

	function submit_edit()
	{
		if (isset($_POST['force_password'])) {
			$ganti_password = "Iya";
		}else{
			$ganti_password = "Tidak";
		}

		if (strlen($this->input->post('password'))==0) {
			$this->load->library('encryption');
			$id_user = $this->input->post('id_user');
			$no_tlp = $this->input->post('no_tlp');
			$no_rek = $this->input->post('no_rek');
			$data = [
				'npm' => $this->input->post('npm'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'kelas' => strtoupper($this->input->post('kelas')),
				'jk' => $this->input->post('jk'),
				'no_tlp' => $this->encryption->encrypt($no_tlp),
				'no_rek' => $this->encryption->encrypt($no_rek),
				'jabatan' => $this->input->post('jabatan'),
				'ganti_password' => $ganti_password
			];
			$this->db->where('id_user', $this->input->post('id_user'));
        	$this->db->update('user', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message_asisten', 'Diubah');
				$deskripsi_log = "User ".$this->input->post('npm')." telah diubah.";
				logger("Asisten", "Mengubah", $deskripsi_log);
				redirect('asisten','refresh');
			}
		} else{
			$this->load->library('encryption');
			$id_user = $this->input->post('id_user');
			$no_tlp = $this->input->post('no_tlp');
			$no_rek = $this->input->post('no_rek');
			$data = [
				'npm' => $this->input->post('npm'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'kelas' => strtoupper($this->input->post('kelas')),
				'jk' => $this->input->post('jk'),
				'no_tlp' => $this->encryption->encrypt($no_tlp),
				'no_rek' => $this->encryption->encrypt($no_rek),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'jabatan' => $this->input->post('jabatan'),
				'ganti_password' => $ganti_password
			];
			$this->db->where('id_user', $this->input->post('id_user'));
        	$this->db->update('user', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message_asisten', 'Diubah');
				$deskripsi_log = "User ".$this->input->post('npm')." telah diubah.";
				logger("Asisten", "Mengubah", $deskripsi_log);
				redirect('asisten','refresh');
			}
		}
	}
}

/* End of file M_asisten.php */
/* Location: ./application/Models/M_asisten.php */