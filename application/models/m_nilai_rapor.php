<?php

class m_nilai_rapor extends CI_Model
{
	public function nilai_rapor()
	{
		$this->db->select('id_siswa, nama_siswa');
		$this->db->from('tbl_data_siswa');
		$this->db->order_by('id_siswa', 'DESC');
		return $this->db->get()->result();
	}

	public function input_nilai()
	{
		$this->db->select('tbl_nilai_rapor.*, tbl_mata_pelajaran.kkm');
		$this->db->from('tbl_nilai_rapor');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_nilai_rapor.id_ajar', 'left');
		// $this->db->join('tbl_data_siswa', 'tbl_data_siswa.nis = tbl_nilai_rapor.nis', 'left');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_nilai_rapor.id_mapel', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_nilai_rapor.id_kelas', 'left');
		$this->db->order_by('id_nilai', 'DESC');
		return $this->db->get()->result();
	}

	public function input_proses_nilai($data)
	{
		$this->db->insert('tbl_nilai_rapor', $data);
	}
}
