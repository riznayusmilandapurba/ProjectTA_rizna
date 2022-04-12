<?php

class m_pengumuman extends CI_Model
{
	public function pengumuman()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user', 'left');
		$this->db->order_by('id_pengumuman', 'desc');
		return $this->db->get()->result();
	}

	public function detail_pengumuman($id_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->where('id_pengumuman', $id_pengumuman);
		return $this->db->get()->row();
	}

	public function tambah_pengumuman($data)
	{
		$this->db->insert('tbl_pengumuman', $data);
	}

	public function edit_pengumuman($data)
	{
		$this->db->where('id_pengumuman', $data['id_pengumuman']);
		$this->db->update('tbl_pengumuman', $data);
	}

	public function delete_pengumuman($data)
	{
		$this->db->where('id_pengumuman', $data['id_pengumuman']);
		$this->db->delete('tbl_pengumuman', $data);
	}

	public function cariDataPengumuman($id_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user', 'left');
		// $this->db->like('nama_siswa', $id_siswa);
		$this->db->like('judul_pengumuman', $id_pengumuman);
		return $this->db->get()->result();
	}
}
