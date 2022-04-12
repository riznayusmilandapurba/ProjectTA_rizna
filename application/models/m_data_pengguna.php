<?php

class m_data_pengguna extends CI_Model
{
	public function user_role()
	{
		$this->db->select('*');
		$this->db->from('tbl_user_role');
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}

	public function register()
	{
		$this->db->select('tbl_user.id_user,name,email,password, tbl_user_role.role');
		$this->db->from('tbl_user');
		$this->db->join('tbl_user_role', 'tbl_user.role_id = tbl_user_role.id', 'left');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}

	public function detail_register($id_user)
	{
		$this->db->select('tbl_user.*, tbl_user_role.role');
		$this->db->from('tbl_user');
		$this->db->join('tbl_user_role', 'tbl_user.role_id = tbl_user_role.id', 'left');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->row();
	}


	public function edit_registration($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}

	public function delete_registration($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tbl_user', $data);
	}

	public function cariDataPengguna($id_user)
	{
		$this->db->select('tbl_user.id_user,name,email,password, tbl_user_role.role');
		$this->db->from('tbl_user');
		$this->db->join('tbl_user_role', 'tbl_user.role_id = tbl_user_role.id', 'left');
		$this->db->like('role', $id_user);
		return $this->db->get()->result();
	}

	public function hitungDataArtikel()
	{
		$query = $this->db->get('tbl_artikel');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function hitungDataPengumuman()
	{
		$query = $this->db->get('tbl_pengumuman');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function hitungDataKegiatan()
	{
		$query = $this->db->get('tbl_kegiatan_ekstrakulikuler');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function countAllPengguna()
	{
		$query = $this->db->get('tbl_user');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function getPengguna($limit, $start)
	{
		$this->db->select('tbl_user.id_user,name,email,password, tbl_user_role.role');
		$this->db->from('tbl_user');
		$this->db->join('tbl_user_role', 'tbl_user.role_id = tbl_user_role.id', 'left');
		$this->db->order_by('id_user', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
}
