<?php

class m_rombel extends CI_Model
{
	function data_rombel()
	{
		$this->db->select('tbl_rombel.*, tbl_data_kelas.nama_kelas, tbl_tahun_ajar.tahun_ajar, tbl_data_pengajar.nama_pengajar, tbl_mata_pelajaran.nama_mapel');
		$this->db->from('tbl_rombel');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas= tbl_rombel.id_kelas', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_rombel.id_ajar', 'left');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_rombel.id_pengajar', 'left');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_rombel.id_mapel', 'left');
		$this->db->order_by('id_rombel', 'desc');
		return $this->db->get()->result();
	}

	public function detail_rombel($id_rombel)
	{
		$this->db->select('tbl_rombel.*, tbl_data_kelas.nama_kelas, tbl_tahun_ajar.tahun_ajar, tbl_data_pengajar.nama_pengajar, tbl_mata_pelajaran.nama_mapel');
		$this->db->from('tbl_rombel');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas= tbl_rombel.id_kelas', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_rombel.id_ajar', 'left');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_rombel.id_pengajar', 'left');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_rombel.id_mapel', 'left');
		$this->db->where('id_rombel', $id_rombel);
		return $this->db->get()->row();
	}

	public function tambah_rombel($data)
	{
		$this->db->insert('tbl_rombel', $data);
	}

	public function edit_rombel($data)
	{
		$this->db->where('id_rombel', $data['id_rombel']);
		$this->db->update('tbl_rombel', $data);
	}

	public function delete_rombel($data)
	{
		$this->db->where('id_rombel', $data['id_rombel']);
		$this->db->delete('tbl_rombel ', $data);
	}

	public function cariDataRombel($id_rombel)
	{
		$this->db->select('tbl_rombel.*, tbl_data_kelas.nama_kelas, tbl_tahun_ajar.tahun_ajar, tbl_data_pengajar.nama_pengajar, tbl_mata_pelajaran.nama_mapel');
		$this->db->from('tbl_rombel');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas= tbl_rombel.id_kelas', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_rombel.id_ajar', 'left');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_rombel.id_pengajar', 'left');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_rombel.id_mapel', 'left');
		$this->db->like('nama_kelas', $id_rombel);
		return $this->db->get()->result();
	}
}
