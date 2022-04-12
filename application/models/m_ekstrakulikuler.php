<?php

class m_ekstrakulikuler extends CI_Model
{
	public function data_ekstrakulikuler()
	{
		$this->db->select('*');
		$this->db->from('tbl_ekstrakulikuler');
		$this->db->order_by('id_ekstrakulikuler', 'DESC');
		return $this->db->get()->result();
	}

	public function detail_data_ekstrakulikuler($id_ekstrakulikuler)
	{
		$this->db->select('*');
		$this->db->from('tbl_ekstrakulikuler');
		$this->db->where('id_ekstrakulikuler', $id_ekstrakulikuler);
		return $this->db->get()->row();
	}

	public function tambah_data_ekstrakulikuler()
	{
		$data = array(
			'nama_ekstrakulikuler' => $this->input->post('nama_ekstrakulikuler'),
		);
		$this->db->insert('tbl_ekstrakulikuler', $data);
	}

	public function edit_data_ekstrakulikuler($data)
	{
		$this->db->where('id_ekstrakulikuler', $data['id_ekstrakulikuler']);
		$this->db->update('tbl_ekstrakulikuler', $data);
	}

	public function delete_data_ekstrakulikuler($data)
	{
		$this->db->where('id_ekstrakulikuler', $data['id_ekstrakulikuler']);
		$this->db->delete('tbl_ekstrakulikuler', $data);
	}

	//Kegiatan Ekstrakulikuler
	function kegiatan_ekstrakulikuler()
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->order_by('id_kegiatan', 'desc');
		return $this->db->get()->result();
	}

	public function detail_kegiatan_ekstrakulikuler($id_kegiatan)
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->where('id_kegiatan', $id_kegiatan);
		return $this->db->get()->row();
	}

	public function tambah_kegiatan_ekstrakulikuler($data)
	{
		$this->db->insert('tbl_kegiatan_ekstrakulikuler', $data);
	}

	public function edit_kegiatan_ekstrakulikuler($data)
	{
		$this->db->where('id_kegiatan', $data['id_kegiatan']);
		$this->db->update('tbl_kegiatan_ekstrakulikuler', $data);
	}

	public function delete_kegiatan_ekstrakulikuler($data)
	{
		$this->db->where('id_kegiatan', $data['id_kegiatan']);
		$this->db->delete('tbl_kegiatan_ekstrakulikuler', $data);
	}

	public function cariKegiatanEkstrakulikuler($id_kegiatan)
	{
		$this->db->select('tbl_kegiatan_ekstrakulikuler.*, tbl_ekstrakulikuler.nama_ekstrakulikuler, tbl_data_kelas.nama_kelas');
		$this->db->from('tbl_kegiatan_ekstrakulikuler');
		$this->db->join('tbl_ekstrakulikuler', 'tbl_ekstrakulikuler.id_ekstrakulikuler= tbl_kegiatan_ekstrakulikuler.id_ekstrakulikuler', 'left');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_kegiatan_ekstrakulikuler.id_kelas', 'left');
		$this->db->like('nama_ekstrakulikuler', $id_kegiatan);
		return $this->db->get()->result();
	}
}
