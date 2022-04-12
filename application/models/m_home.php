<?php

class m_home extends CI_Model
{
	//Artikel
	public function countAllArtikelHome()
	{
		$query = $this->db->get('tbl_artikel');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function getArtikelHome($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user= tbl_artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function home_artikel()
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user= tbl_artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		return $this->db->get()->result();
	}

	public function total_artikel()
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		return $this->db->get()->result();
	}

	public function home_artikel_detail($id_artikel)
	{
		$this->db->select('*');
		$this->db->from('tbl_artikel');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');;
		$this->db->where('id_artikel', $id_artikel);
		return $this->db->get()->row();
	}

	//Pengumuman
	public function home_pengumuman($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_pengumuman', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function total_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_pengumuman', 'desc');
		return $this->db->get()->result();
	}

	public function home_pengumuman_detail($id_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->where('id_pengumuman', $id_pengumuman);
		return $this->db->get()->row();
	}
	//Ekstrakulikuler
	public function home_ekstrakulikuler($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_ekstrakulikuler');
		$this->db->order_by('id_ekstrakulikuler', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function total_ekstrakulikuler()
	{
		$this->db->select('*');
		$this->db->from('tbl_ekstrakulikuler');
		$this->db->order_by('id_ekstrakulikuler', 'desc');
		return $this->db->get()->result();
	}

	//Profil
	public function home_profil($limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tbl_profil');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_profil', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function total_profil()
	{
		$this->db->select('*');
		$this->db->from('tbl_profil');
		// $this->db->join('tbl_user', 'tbl_user.id_user = tbl_artikel.id_user', 'left');
		$this->db->order_by('id_profil', 'desc');
		return $this->db->get()->result();
	}

	public function home_kegiatan($limit, $start)
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->order_by('id_kegiatan', 'desc');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function home_kegiatan_detail($id_kegiatan)
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->where('id_kegiatan', $id_kegiatan);
		return $this->db->get()->row();
	}

	public function total_kegiatan()
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->order_by('id_kegiatan', 'desc');
		return $this->db->get()->result();
	}
}
