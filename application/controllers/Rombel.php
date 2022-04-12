<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rombel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_pengguna');
		$this->load->model('m_akademik');
		$this->load->model('m_rombel');
	}

	public function data_rombel()
	{
		$id_kelas = $this->input->get('id_kelas');
		if ($id_kelas) {
			$data_rombel = $this->m_rombel->cariDataRombel($id_kelas);
		} else {
			$data_rombel = $this->m_rombel->data_rombel();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Data Rombel',
			'data_rombel' => $data_rombel
		);
		$this->load->view('rombel/data_rombel', $data);
	}

	public function tambah_rombel()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Data Rombel',
			'data_rombel' => $this->m_rombel->data_rombel(),
			'tahun_ajar' => $this->m_akademik->tahun_ajar(),
			'data_pengajar' => $this->m_pengguna->data_pengajar(),
			'data_kelas' => $this->m_akademik->data_kelas(),
			'mata_pelajaran' => $this->m_akademik->mata_pelajaran()

		);

		$this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('id_ajar', 'Tahun Ajar', 'required');
		$this->form_validation->set_rules('id_pengajar', 'Wali Kelas', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('rombel/tambah_rombel', $data);
		} else {
			$data = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'id_ajar' => $this->input->post('id_ajar'),
				'id_pengajar' => $this->input->post('id_pengajar'),
				'id_mapel' => $this->input->post('id_mapel')
			);
			$this->m_rombel->tambah_rombel($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('rombel/data_rombel');
		}
	}

	public function edit_rombel($id_rombel)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Data Rombel',
			'data_rombel' => $this->m_rombel->detail_rombel($id_rombel),
			'tahun_ajar' => $this->m_akademik->tahun_ajar(),
			'data_pengajar' => $this->m_pengguna->data_pengajar(),
			'data_kelas' => $this->m_akademik->data_kelas(),
			'mata_pelajaran' => $this->m_akademik->mata_pelajaran()

		);

		$this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('id_ajar', 'Tahun Ajar', 'required');
		$this->form_validation->set_rules('id_pengajar', 'Wali Kelas', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('rombel/edit_rombel', $data);
		} else {
			$data = array(
				'id_rombel' => $id_rombel,
				'id_kelas' => $this->input->post('id_kelas'),
				'id_ajar' => $this->input->post('id_ajar'),
				'id_pengajar' => $this->input->post('id_pengajar'),
				'id_mapel' => $this->input->post('id_mapel')
			);
			$this->m_rombel->edit_rombel($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('rombel/data_rombel');
		}
	}

	function delete_rombel($id_rombel)
	{
		$data = array('id_rombel' => $id_rombel);
		$this->m_rombel->delete_rombel($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('rombel/data_rombel');
	}
}
