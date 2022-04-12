<?php

class m_pengguna extends CI_Model
{
	public function data_pengajar()
	{
		$this->db->select('tbl_data_pengajar.*, tbl_mata_pelajaran.nama_mapel, tbl_user.id_user');
		$this->db->from('tbl_data_pengajar');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_data_pengajar.id_mapel', 'left');
		$this->db->join('tbl_user', 'tbl_data_pengajar.id_user = tbl_user.id_user', 'left');
		$this->db->order_by('id_pengajar', 'DESC');
		return $this->db->get()->result();
	}

	public function detail_data_pengajar($id_pengajar)
	{
		$this->db->select('tbl_data_pengajar.*, tbl_mata_pelajaran.nama_mapel, tbl_user.id_user');
		$this->db->from('tbl_data_pengajar');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_data_pengajar.id_mapel', 'left');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_data_pengajar.id_user', 'left');
		$this->db->where('id_pengajar', $id_pengajar);
		return $this->db->get()->row();
	}

	public function tambah_data_pengajar($data)
	{
		$this->db->insert('tbl_data_pengajar', $data);
	}

	public function edit_data_pengajar($data)
	{
		$this->db->where('id_pengajar', $data['id_pengajar']);
		$this->db->update('tbl_data_pengajar', $data);
	}

	public function delete_data_pengajar($data)
	{
		$this->db->where('id_pengajar', $data['id_pengajar']);
		$this->db->delete('tbl_data_pengajar', $data);
	}

	// Siswa
	public function data_siswa()
	{
		$this->db->select('tbl_data_siswa.*, tbl_data_kelas.nama_kelas, tbl_user.id_user');
		$this->db->from('tbl_data_siswa');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_data_siswa.id_kelas', 'left');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_data_siswa.id_user', 'left');
		$this->db->order_by('id_siswa', 'DESC');
		return $this->db->get()->result();
	}

	public function detail_data_siswa($id_siswa)
	{
		$this->db->select('tbl_data_siswa.*, tbl_data_kelas.nama_kelas, tbl_user.id_user');
		$this->db->from('tbl_data_siswa');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_data_siswa.id_kelas', 'left');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_data_siswa.id_user', 'left');
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get()->row();
	}

	public function tambah_data_siswa($data)
	{
		$this->db->insert('tbl_data_siswa', $data);
	}

	public function edit_data_siswa($data)
	{
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->update('tbl_data_siswa', $data);
	}

	public function delete_data_siswa($data)
	{
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->delete('tbl_data_siswa', $data);
	}

	public function cariDataSiswa($id_siswa)
	{
		$this->db->select('tbl_data_siswa.*, tbl_data_kelas.nama_kelas, tbl_user.id_user');
		$this->db->from('tbl_data_siswa');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_data_siswa.id_kelas', 'left');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_data_siswa.id_user', 'left');
		// $this->db->like('nama_siswa', $id_siswa);
		$this->db->like('nama_kelas', $id_siswa);
		return $this->db->get()->result();
	}

	public function cariDataPengajar($id_pengajar)
	{
		$this->db->select('tbl_data_pengajar.*, tbl_mata_pelajaran.nama_mapel, tbl_user.id_user');
		$this->db->from('tbl_data_pengajar');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_data_pengajar.id_mapel', 'left');
		$this->db->join('tbl_user', 'tbl_data_pengajar.id_user = tbl_user.id_user', 'left');
		// $this->db->like('nama_siswa', $id_siswa);
		$this->db->like('nama_pengajar', $id_pengajar);
		return $this->db->get()->result();
	}

	public function data_alumni()
	{
		$this->db->select('*');
		$this->db->from('tbl_album_alumni');
		$this->db->order_by('tahun_ajar', 'DESC');
		return $this->db->get()->result();
	}

	public function cariDataAlumni($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_album_alumni');
		$this->db->like('nama_siswa', $id);
		return $this->db->get()->result();
	}

	public function countAllPengajar()
	{
		$query = $this->db->get('tbl_data_pengajar');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function countAllSiswa()
	{
		$query = $this->db->get('tbl_data_siswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function getPengajar($limit, $start)
	{
		$this->db->select('tbl_data_pengajar.*, tbl_mata_pelajaran.nama_mapel, tbl_user.id_user');
		$this->db->from('tbl_data_pengajar');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_data_pengajar.id_mapel', 'left');
		$this->db->join('tbl_user', 'tbl_data_pengajar.id_user = tbl_user.id_user', 'left');
		$this->db->order_by('id_pengajar', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getSiswa($limit, $start)
	{
		$this->db->select('tbl_data_siswa.*, tbl_data_kelas.nama_kelas, tbl_user.id_user');
		$this->db->from('tbl_data_siswa');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_data_siswa.id_kelas', 'left');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_data_siswa.id_user', 'left');
		$this->db->order_by('id_siswa', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
}
