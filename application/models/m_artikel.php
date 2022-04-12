<?php

class m_artikel extends CI_Model
{
	public function artikel()
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		return $this->db->get()->result();
	}

	public function detail_artikel($id_artikel)
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		$this->db->where('id_artikel', $id_artikel);
		return $this->db->get()->row();
	}

	public function tambah_artikel($data)
	{
		$this->db->insert('tbl_artikel', $data);
	}

	public function edit_artikel($data)
	{
		$this->db->where('id_artikel', $data['id_artikel']);
		$this->db->update('tbl_artikel', $data);
	}

	public function delete_artikel($data)
	{
		$this->db->where('id_artikel', $data['id_artikel']);
		$this->db->delete('tbl_artikel', $data);
	}


	public function cariDataArtikel($id_artikel)
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->like('nama_siswa', $id_siswa);
		$this->db->like('judul_artikel', $id_artikel);
		return $this->db->get()->result();
	}

	public function countAllArtikel()
	{
		$query = $this->db->get('tbl_artikel');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function getArtikel($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
}
