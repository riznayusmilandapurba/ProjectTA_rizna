<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_akademik');
		$this->load->model('m_pengguna');
	}

	public function mata_pelajaran()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Mata Pengajar',
			'mata_pelajaran' => $this->m_akademik->mata_pelajaran()
		);
		$this->load->view('akademik/mata_pelajaran', $data);
	}

	public function tambah_mata_pelajaran()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Mata Pelajaran';
		if (isset($_POST['submit'])) {
			$this->m_akademik->tambah_mata_pelajaran();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button> </div>');
			redirect('akademik/mata_pelajaran', $data);
		} else {
			$this->load->view('akademik/tambah_mata_pelajaran', $data);
		}
	}

	public function edit_mata_pelajaran($id_mapel)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Mata Pelajaran',
			'mata_pelajaran' => $this->m_akademik->detail_mata_pelajaran($id_mapel)
		);
		$this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');
		$this->form_validation->set_rules('kkm', 'KKM', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('akademik/edit_mata_pelajaran', $data);
		} else {
			$data = array(
				'id_mapel' => $id_mapel,
				'nama_mapel' => $this->input->post('nama_mapel'),
				'kkm' => $this->input->post('kkm')
			);
			$this->m_akademik->edit_mata_pelajaran($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('akademik/mata_pelajaran');
		}
	}

	function detail_mata_pelajaran()
	{
		$id = $this->uri->segment(4);
		$data = $this->db->get_where('tbl_mata_peajaran', array('id_mapel' => $id))->row_array();
		$this->load->view('akademik/detail_mata_pelajaran', $data);
	}

	function delete_mata_pelajaran($id_mapel)
	{
		$data = array('id_mapel' => $id_mapel);
		$this->m_akademik->delete_mata_pelajaran($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										</div>');
		redirect('akademik/mata_pelajaran');
	}

	// Tahun Ajar

	public function tahun_ajar()
	{
		$tahun_ajar = $this->input->get('tahun_ajar');
		if ($tahun_ajar) {
			$tahun_ajar = $this->m_akademik->cariDataTahunAjar($tahun_ajar);
		} else {
			$tahun_ajar = $this->m_akademik->tahun_ajar();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tahun Ajar',
			'tahun_ajar' => $tahun_ajar
		);
		$this->load->view('akademik/tahun_ajar', $data);
	}
	public function tambah_tahun_ajar()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Tahun Ajar';
		if (isset($_POST['submit'])) {
			$this->m_akademik->tambah_tahun_ajar();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>');
			redirect('akademik/tahun_ajar', $data);
		} else {
			$this->load->view('akademik/tambah_tahun_ajar', $data);
		}
	}
	public function edit_tahun_ajar($id_ajar)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Tahun Ajar',
			'tahun_ajar' => $this->m_akademik->detail_tahun_ajar($id_ajar)
		);
		$this->form_validation->set_rules('tahun_ajar', 'Tahun Ajar', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('akademik/edit_tahun_ajar', $data);
		} else {
			$data = array(
				'id_ajar' => $id_ajar,
				'tahun_ajar' => $this->input->post('tahun_ajar'),
				'semester' => $this->input->post('semester'),
				'status' => $this->input->post('status')
			);
			$this->m_akademik->edit_tahun_ajar($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
													</div>');
			redirect('akademik/tahun_ajar');
		}
	}

	function detail_tahun_ajar()
	{
		$id = $this->uri->segment(4);
		$data = $this->db->get_where('tbl_tahun_ajar', array('id_ajar' => $id))->row_array();
		$this->load->view('akademik/detail_tahun_ajar', $data);
	}

	function delete_tahun_ajar($id_ajar)
	{
		$data = array('id_ajar' => $id_ajar);
		$this->m_akademik->delete_tahun_ajar($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>');
		redirect('akademik/tahun_ajar');
	}

	//Data Kelas
	public function data_kelas()
	{
		$nama_kelas = $this->input->get('nama_kelas');
		if ($nama_kelas) {
			$data_kelas = $this->m_akademik->cariDataKelas($nama_kelas);
		} else {
			$data_kelas = $this->m_akademik->data_kelas();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Data Kelas',
			'data_kelas' => $data_kelas

		);
		$this->load->view('akademik/data_kelas', $data);
	}

	public function tambah_data_kelas()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Data Pengajar',
			'data_pengajar' => $this->m_pengguna->data_pengajar(),
			'tahun_ajar' => $this->m_akademik->tahun_ajar()
		);

		$this->form_validation->set_rules('nama_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_pengajar', 'Wali Kelas', 'required');
		$this->form_validation->set_rules('id_ajar', 'Tahun Ajar', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Tambah Data Kelas',
				'data_pengajar' => $this->m_pengguna->data_pengajar(),
				'tahun_ajar' => $this->m_akademik->tahun_ajar()
			);
			$this->load->view('akademik/tambah_data_kelas', $data);
		} else {
			$data = array(
				'nama_kelas' => $this->input->post('nama_kelas'),
				'id_pengajar' => $this->input->post('id_pengajar'),
				'id_ajar' => $this->input->post('id_ajar')
			);
			$this->m_akademik->tambah_data_kelas($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('akademik/data_kelas');
		}
	}

	public function edit_data_kelas($id_kelas)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Data Pengajar',
			'data_pengajar' => $this->m_pengguna->data_pengajar(),
			'tahun_ajar' => $this->m_akademik->tahun_ajar(),
			'data_kelas' => $this->m_akademik->detail_data_kelas($id_kelas)
		);

		$this->form_validation->set_rules('nama_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_pengajar', 'Wali Kelas', 'required');
		$this->form_validation->set_rules('id_ajar', 'Tahun Ajar', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('akademik/edit_data_kelas', $data);
		} else {
			$data = array(
				'id_kelas' => $id_kelas,
				'nama_kelas' => $this->input->post('nama_kelas'),
				'id_pengajar' => $this->input->post('id_pengajar'),
				'id_ajar' => $this->input->post('id_ajar')
			);
			$this->m_akademik->edit_data_kelas($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('akademik/data_kelas');
		}
	}
	function delete_data_kelas($id_kelas)
	{
		$data = array('id_kelas' => $id_kelas);
		$this->m_akademik->delete_data_kelas($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span></button></div>');
		redirect('akademik/data_kelas');
	}
}
