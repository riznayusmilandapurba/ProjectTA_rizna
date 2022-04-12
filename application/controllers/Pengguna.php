<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('m_pengguna');
		$this->load->model('m_akademik');
		$this->load->model('m_data_pengguna');
	}

	//Pengajar
	public function data_pengajar()
	{
		$nama_pengajar = $this->input->get('nama_pengajar');
		if ($nama_pengajar) {
			$data_pengajar = $this->m_pengguna->cariDataPengajar($nama_pengajar);
		} else {
			$data_pengajar = $this->m_pengguna->data_pengajar();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Data Pengajar',
			'data_pengajar' => $data_pengajar
		);
		//PAGINATION 

		// $this->load->library('pagination');
		// $config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/pengguna/data_pengajar';
		// $config['total_rows'] = $this->m_pengguna->countAllPengajar();
		// $config['per_page'] = 5;

		// $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		// $config['full_tag_close'] = '  </ul></nav>';

		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item">';
		// $config['first_tag_close'] = '</li>';

		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item">';
		// $config['last_tag_close'] = '</li>';

		// $config['next_link'] = '&raquo';
		// $config['next_tag_open'] = '<li class="page-item">';
		// $config['next_tag_close'] = '</li>';

		// $config['prev_link'] = '&laquo';
		// $config['prev_tag_open'] = '<li class="page-item">';
		// $config['prev_tag_close'] = '</li>';

		// $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		// $config['cur_tag_close'] = '</a></li>';

		// $config['num_tag_open'] = '<li class="page-item">';
		// $config['num_tag_close'] = '</li>';

		// $config['attributes'] = array('class' => 'page-link btn-success');

		// $this->pagination->initialize($config);

		// $data['start'] = $this->uri->segment(3);
		// $data['data_pengajar'] = $this->m_pengguna->getPengajar($config['per_page'], $data['start']);

		$this->load->view('pengguna/data_pengajar', $data);
	}

	public function tambah_data_pengajar()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Data Pengajar',
			'data_pengajar' => $this->m_pengguna->data_pengajar(),
			'mata_pelajaran' => $this->m_akademik->mata_pelajaran(),
			'register' => $this->m_data_pengguna->register()
		);

		$this->form_validation->set_rules('id_user', 'NIP', 'required');
		$this->form_validation->set_rules('nama_pengajar', 'Nama Pengajar', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required');
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('tahun_bertugas', 'Tahun Bertugas', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Tambah Data Pengajar',
				'mata_pelajaran' => $this->m_akademik->mata_pelajaran()
			);
			$this->load->view('pengguna/tambah_data_pengajar', $data);
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'nama_pengajar' => $this->input->post('nama_pengajar'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				'fakultas' => $this->input->post('fakultas'),
				'program_studi' => $this->input->post('program_studi'),
				'id_mapel' => $this->input->post('id_mapel'),
				'tahun_bertugas' => $this->input->post('tahun_bertugas'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
			);
			$this->m_pengguna->tambah_data_pengajar($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/data_pengajar');
		}
	}

	public function edit_data_pengajar($id_pengajar)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Data Pengajar',
			'mata_pelajaran' => $this->m_akademik->mata_pelajaran(),
			'data_pengajar' => $this->m_pengguna->detail_data_pengajar($id_pengajar)
		);

		$this->form_validation->set_rules('id_user', 'NIP', 'required');
		$this->form_validation->set_rules('nama_pengajar', 'Nama Pengajar', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required');
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('tahun_bertugas', 'Tahun Bertugas', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('pengguna/edit_data_pengajar', $data);
		} else {
			$data = array(
				'id_pengajar' => $id_pengajar,
				'id_user' => $this->input->post('id_user'),
				'nama_pengajar' => $this->input->post('nama_pengajar'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				'fakultas' => $this->input->post('fakultas'),
				'program_studi' => $this->input->post('program_studi'),
				'id_mapel' => $this->input->post('id_mapel'),
				'tahun_bertugas' => $this->input->post('tahun_bertugas'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
			);
			$this->m_pengguna->edit_data_pengajar($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/data_pengajar');
		}
	}
	public function delete_data_pengajar($id_pengajar)
	{
		$data = array('id_pengajar' => $id_pengajar);
		$this->m_pengguna->delete_data_pengajar($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('pengguna/data_pengajar');
	}

	// Siswa
	public function data_siswa()
	{
		$id_kelas = $this->input->get('id_kelas');
		if ($id_kelas) {
			$data_siswa = $this->m_pengguna->cariDataSiswa($id_kelas);
		} else {
			$data_siswa = $this->m_pengguna->data_siswa();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata(
				'email'
			)])->row_array(),
			'title' => 'Data Siswa',
			'data_siswa' => $data_siswa
		);

		// //PAGINATION 

		// $this->load->library('pagination');
		// $config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/pengguna/data_siswa';
		// $config['total_rows'] = $this->m_pengguna->countAllSiswa();
		// $config['per_page'] = 5;

		// $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		// $config['full_tag_close'] = '  </ul></nav>';

		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li class="page-item">';
		// $config['first_tag_close'] = '</li>';

		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li class="page-item">';
		// $config['last_tag_close'] = '</li>';

		// $config['next_link'] = '&raquo';
		// $config['next_tag_open'] = '<li class="page-item">';
		// $config['next_tag_close'] = '</li>';

		// $config['prev_link'] = '&laquo';
		// $config['prev_tag_open'] = '<li class="page-item">';
		// $config['prev_tag_close'] = '</li>';

		// $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		// $config['cur_tag_close'] = '</a></li>';

		// $config['num_tag_open'] = '<li class="page-item">';
		// $config['num_tag_close'] = '</li>';

		// $config['attributes'] = array('class' => 'page-link');

		// $this->pagination->initialize($config);

		// $data['start'] = $this->uri->segment(3);
		// $data['data_siswa'] = $this->m_pengguna->getSiswa($config['per_page'], $data['start']);

		$this->load->view('pengguna/data_siswa', $data);
	}


	public function tambah_data_siswa()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Data Siswa',
			'data_siswa' => $this->m_pengguna->data_siswa(),
			'data_kelas' => $this->m_akademik->data_kelas(),
			'register' => $this->m_data_pengguna->register()
		);

		$this->form_validation->set_rules('id_user', 'NIS', 'required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('nisn', 'NISN', 'required');
		$this->form_validation->set_rules('no_kk', 'No Kartu Keluarga', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jalan', 'Jalan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Tambah Data Siswa',
				'data_kelas' => $this->m_akademik->data_kelas()
			);
			$this->load->view('pengguna/tambah_data_siswa', $data);
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'nama_siswa' => $this->input->post('nama_siswa'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nisn' => $this->input->post('nisn'),
				'no_kk' => $this->input->post('no_kk'),
				'nik' => $this->input->post('nik'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'jalan' => $this->input->post('jalan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'kode_pos' => $this->input->post('kode_pos'),

			);
			$this->m_pengguna->tambah_data_siswa($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/data_siswa');
		}
	}

	public function edit_data_siswa($id_siswa)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Data Siswa',
			'data_kelas' => $this->m_akademik->data_kelas(),
			'data_siswa' => $this->m_pengguna->detail_data_siswa($id_siswa)
		);

		$this->form_validation->set_rules('id_user', 'NIS', 'required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('nisn', 'NISN', 'required');
		$this->form_validation->set_rules('no_kk', 'No Kartu Keluarga', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jalan', 'Jalan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('pengguna/edit_data_siswa', $data);
		} else {
			$data = array(
				'id_siswa' => $id_siswa,
				'id_user' => $this->input->post('id_user'),
				'nama_siswa' => $this->input->post('nama_siswa'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nisn' => $this->input->post('nisn'),
				'no_kk' => $this->input->post('no_kk'),
				'nik' => $this->input->post('nik'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'jalan' => $this->input->post('jalan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'kode_pos' => $this->input->post('kode_pos'),

			);
			$this->m_pengguna->edit_data_siswa($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/data_siswa');
		}
	}

	public function delete_data_siswa($id_siswa)
	{
		$data = array('id_siswa' => $id_siswa);
		$this->m_pengguna->delete_data_siswa($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('pengguna/data_siswa');
	}

	public function album_alumni()
	{
		$nama_siswa = $this->input->get('nama_siswa');
		if ($nama_siswa) {
			$data_alumni = $this->m_pengguna->cariDataAlumni($nama_siswa);
		} else {
			$data_alumni = $this->m_pengguna->data_alumni();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Album Alumni',
			'data_alumni' => $data_alumni
		);
		$this->load->view('pengguna/album_alumni', $data);
	}
}
