<?php

class m_profil extends CI_Model
{
	public function profil()
	{
		$this->db->select('*');
		$this->db->from('tbl_profil');
		$this->db->join('tbl_user', 'tbl_user.id_user= tbl_profil.id_user', 'left');
		$this->db->order_by('id_profil', 'desc');
		return $this->db->get()->result();
	}

	public function detail_profil($id_profil)
	{
		$this->db->select('*');
		$this->db->from('tbl_profil');
		$this->db->where('id_profil', $id_profil);
		return $this->db->get()->row();
	}

	public function tambah_profil($data)
	{
		$this->db->insert('tbl_profil', $data);
	}

	public function edit_profil($data)
	{
		$this->db->where('id_profil', $data['id_profil']);
		$this->db->update('tbl_profil', $data);
	}

	public function delete_profil($data)
	{
		$this->db->where('id_profil', $data['id_profil']);
		$this->db->delete('tbl_profil', $data);
	}
}
