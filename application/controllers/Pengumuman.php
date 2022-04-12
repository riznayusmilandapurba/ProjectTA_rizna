<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_pengumuman');
	}
	public function pengumuman()
	{
		$judul_pengumuman = $this->input->get('judul_pengumuman');
		if ($judul_pengumuman) {
			$pengumuman = $this->m_pengumuman->cariDataPengumuman($judul_pengumuman);
		} else {
			$pengumuman = $this->m_pengumuman->pengumuman();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Pengumuman',
			'pengumuman' => $pengumuman
		);
		$this->load->view('pengumuman/pengumuman', $data);
	}

	public function tambah_pengumuman()
	{
		$this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s Harus diisi'));
		if ($this->form_validation->run() == false) {
			$data = array(
				'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Tambah Pengumuman',
			);
			$this->load->view('pengumuman/tambah_pengumuman', $data);
		} else {
			$data = array(
				'judul_pengumuman' => $this->input->post('judul_pengumuman'),
				'keterangan' => $this->input->post('keterangan'),
				'id_user' => 1
			);
			$this->m_pengumuman->tambah_pengumuman($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengumuman/pengumuman');
		}
	}

	public function edit_pengumuman($id_pengumuman)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Mata Pelajaran',
			'pengumuman' => $this->m_pengumuman->detail_pengumuman($id_pengumuman)
		);
		$this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
		$this->form_validation->set_rules('tanggal_pengumuman', 'Tanggal Pengumuman', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('pengumuman/edit_pengumuman', $data);
		} else {
			$data = array(
				'id_pengumuman' => $id_pengumuman,
				'judul_pengumuman' => $this->input->post('judul_pengumuman'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal_pengumuman' => $this->input->post('tanggal_pengumuman'),
				'id_user' => 1
			);
			$this->m_pengumuman->edit_pengumuman($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengumuman/pengumuman');
		}
	}
	function delete_pengumuman($id_pengumuman)
	{
		$data = array('id_pengumuman' => $id_pengumuman);
		$this->m_pengumuman->delete_pengumuman($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('pengumuman/pengumuman');
	}
}
