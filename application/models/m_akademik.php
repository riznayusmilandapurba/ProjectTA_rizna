<?php

class m_akademik extends CI_Model
{

	//Mata Pelajaran
	function mata_pelajaran()
	{
		$this->db->select('*');
		$this->db->from('tbl_mata_pelajaran');
		$this->db->order_by('id_mapel', 'desc');
		return $this->db->get()->result();
	}

	function tambah_mata_pelajaran()
	{
		$data = array(
			'nama_mapel' => $this->input->post('nama_mapel'),
			'kkm' => $this->input->post('kkm'),
		);
		$this->db->insert('tbl_mata_pelajaran', $data);
	}



	function detail_mata_pelajaran($id_mapel)
	{
		$this->db->select('*');
		$this->db->from('tbl_mata_pelajaran');
		$this->db->where('id_mapel', $id_mapel);
		return $this->db->get()->row();
	}

	public function edit_mata_pelajaran($data)
	{
		$this->db->where('id_mapel', $data['id_mapel']);
		$this->db->update('tbl_mata_pelajaran', $data);
	}

	public function delete_mata_pelajaran($data)
	{
		$this->db->where('id_mapel', $data['id_mapel']);
		$this->db->delete('tbl_mata_pelajaran', $data);
	}

	//Tahun Ajar
	function tahun_ajar()
	{
		$this->db->select('*');
		$this->db->from('tbl_tahun_ajar');
		$this->db->order_by('id_ajar', 'desc');
		return $this->db->get()->result();
	}

	function tambah_tahun_ajar()
	{
		$data = array(
			'tahun_ajar' => $this->input->post('tahun_ajar'),
			'semester' => $this->input->post('semester'),
			'status' => $this->input->post('status')
		);
		$this->db->insert('tbl_tahun_ajar', $data);
	}

	function detail_tahun_ajar($id_ajar)
	{
		$this->db->select('*');
		$this->db->from('tbl_tahun_ajar');
		$this->db->where('id_ajar', $id_ajar);
		return $this->db->get()->row();
	}

	public function edit_tahun_ajar($data)
	{
		$this->db->where('id_ajar', $data['id_ajar']);
		$this->db->update('tbl_tahun_ajar', $data);
	}

	public function delete_tahun_ajar($data)
	{
		$this->db->where('id_ajar', $data['id_ajar']);
		$this->db->delete('tbl_tahun_ajar', $data);
	}

	//Data Kelas
	function data_kelas()
	{
		$this->db->select('tbl_data_kelas.*, tbl_data_pengajar.nama_pengajar, tbl_tahun_ajar.tahun_ajar');
		$this->db->from('tbl_data_kelas');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_data_kelas.id_pengajar', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_data_kelas.id_ajar', 'left');
		$this->db->order_by('id_kelas', 'desc');
		return $this->db->get()->result();
	}

	public function detail_data_kelas($id_kelas)
	{
		$this->db->select('tbl_data_kelas.*, tbl_data_pengajar.nama_pengajar, tbl_tahun_ajar.tahun_ajar');
		$this->db->from('tbl_data_kelas');
		$this->db->join('tbl_data_pengajar', 'tbl_data_kelas.id_kelas = tbl_data_pengajar.id_pengajar', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_data_kelas.id_kelas = tbl_tahun_ajar.id_ajar', 'left');
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->get()->row();
	}

	public function tambah_data_kelas($data)
	{
		$this->db->insert('tbl_data_kelas', $data);
	}

	public function edit_data_kelas($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('tbl_data_kelas', $data);
	}

	public function delete_data_kelas($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->delete('tbl_data_kelas', $data);
	}

	public function cariDataKelas($id_kelas)
	{
		$this->db->select('tbl_data_kelas.*, tbl_data_pengajar.nama_pengajar, tbl_tahun_ajar.tahun_ajar');
		$this->db->from('tbl_data_kelas');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_data_kelas.id_pengajar', 'left');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_data_kelas.id_ajar', 'left');
		$this->db->like('nama_kelas', $id_kelas);
		return $this->db->get()->result();
	}

	public function cariDataTahunAjar($id_ajar)
	{

		$this->db->select('*');
		$this->db->from('tbl_tahun_ajar');
		$this->db->like('tahun_ajar', $id_ajar);
		return $this->db->get()->result();
	}
}
