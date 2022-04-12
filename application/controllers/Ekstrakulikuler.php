<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekstrakulikuler extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_ekstrakulikuler');
		$this->load->model('m_akademik');
	}
	public function data_ekstrakulikuler()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Data Ekstrakulikuler',
			'data_ekstrakulikuler' => $this->m_ekstrakulikuler->data_ekstrakulikuler()
		);
		$this->load->view('ekstrakulikuler/data_ekstrakulikuler', $data);
	}

	public function tambah_data_ekstrakulikuler()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Ektrakulikuler';
		if (isset($_POST['submit'])) {
			$this->m_ekstrakulikuler->tambah_data_ekstrakulikuler();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('ekstrakulikuler/data_ekstrakulikuler', $data);
		} else {
			$this->load->view('ekstrakulikuler/tambah_data_ekstrakulikuler', $data);
		}
	}

	public function edit_data_ekstrakulikuler($id_ekstrakulikuler)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Data Ekstrakulikuler',
			'data_ekstrakulikuler' => $this->m_ekstrakulikuler->detail_data_ekstrakulikuler($id_ekstrakulikuler)
		);
		$this->form_validation->set_rules('nama_ekstrakulikuler', 'Nama Ekstrakulikuler', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('ekstrakulikuler/edit_data_ekstrakulikuler', $data);
		} else {
			$data = array(
				'id_ekstrakulikuler' => $id_ekstrakulikuler,
				'nama_ekstrakulikuler' => $this->input->post('nama_ekstrakulikuler'),
			);
			$this->m_ekstrakulikuler->edit_data_ekstrakulikuler($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('ekstrakulikuler/data_ekstrakulikuler');
		}
	}

	function detail_data_ekstrakulikuler()
	{
		$id = $this->uri->segment(4);
		$data = $this->db->get_where('tbl_ekstrakulikuler', array('id_ekstrakulikuler' => $id))->row_array();
		$this->load->view('ekstrakulikuler/detail_data_ekstrakulikuler', $data);
	}

	function delete_data_ekstrakulikuler($id_ekstrakulikuler)
	{
		$data = array('id_ekstrakulikuler' => $id_ekstrakulikuler);
		$this->m_ekstrakulikuler->delete_data_ekstrakulikuler($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil dihapus! 
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span></button></div>');
		redirect('ekstrakulikuler/data_ekstrakulikuler');
	}

	//Kegiatan Ekstrakulikuler
	public function kegiatan_ekstrakulikuler()
	{
		$id_ekstrakulikuler = $this->input->get('id_ekstrakulikuler');
		if ($id_ekstrakulikuler) {
			$kegiatan_ekstrakulikuler = $this->m_ekstrakulikuler->cariKegiatanEkstrakulikuler($id_ekstrakulikuler);
		} else {
			$kegiatan_ekstrakulikuler = $this->m_ekstrakulikuler->kegiatan_ekstrakulikuler();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Kegiatan Ekstrakulikuler',
			'kegiatan_ekstrakulikuler' => $kegiatan_ekstrakulikuler

		);
		$this->load->view('ekstrakulikuler/kegiatan_ekstrakulikuler', $data);
	}

	public function tambah_kegiatan_ekstrakulikuler()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Kegiatan Ekstrakulikuler',
			'kegiatan_ekstrakulikuler' => $this->m_ekstrakulikuler->kegiatan_ekstrakulikuler(),
			'data_ekstrakulikuler' => $this->m_ekstrakulikuler->data_ekstrakulikuler(),
			'data_kelas' => $this->m_akademik->data_kelas()

		);

		$this->load->view('ekstrakulikuler/tambah_kegiatan_ekstrakulikuler', $data);
	}

	public function upload_kegiatan()
	{
		$filename = $_FILES['image']['name'];
		//var_dump($filename);
		$config['upload_path']          = 'uploads';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['file_name']			= $filename;
		//var_dump($config);
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {

			$id_ekstrakulikuler = $this->input->post('id_ekstrakulikuler');
			$tanggal = $this->input->post('tanggal');
			$id_kelas = $this->input->post('id_kelas');
			$keterangan = $this->input->post('keterangan');
			$image = $this->upload->data();
			$image = $image['file_name'];

			$data = array(
				'id_ekstrakulikuler' => $id_ekstrakulikuler,
				'tanggal' => $tanggal,
				'id_kelas' => $id_kelas,
				'image' => $image,
				'keterangan' => $keterangan
			);
			$this->m_ekstrakulikuler->tambah_kegiatan_ekstrakulikuler($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('ekstrakulikuler/kegiatan_ekstrakulikuler');
		} else {

			echo $this->upload->display_errors();
			//echo "Gagal tambah";
		}
	}

	public function edit_kegiatan_ekstrakulikuler($id_kegiatan)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Kegiatan Ekstrakulikuler',
			'data_ekstrakulikuler' => $this->m_ekstrakulikuler->data_ekstrakulikuler(),
			'data_kelas' => $this->m_akademik->data_kelas(),
			'kegiatan_ekstrakulikuler' => $this->m_ekstrakulikuler->detail_kegiatan_ekstrakulikuler($id_kegiatan)
		);
		$this->load->view('ekstrakulikuler/edit_kegiatan_ekstrakulikuler', $data);
	}

	public function upload_edit_kegiatan()
	{

		$filename = $_FILES['image']['name'];

		if ($filename == "") {
			$id_ekstrakulikuler = $this->input->post('id_ekstrakulikuler');
			$tanggal = $this->input->post('tanggal');
			$id_kelas = $this->input->post('id_kelas');
			$keterangan = $this->input->post('keterangan');


			$data = array(
				'id_ekstrakulikuler' => $id_ekstrakulikuler,
				'tanggal' => $tanggal,
				'id_kelas' => $id_kelas,
				'keterangan' => $keterangan

			);
			$this->m_ekstrakulikuler->edit_kegiatan_ekstrakulikuler($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('ekstrakulikuler/kegiatan_ekstrakulikuler');
		} else {

			//var_dump($filename);
			$config['upload_path']          = 'uploads';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|xlsx';
			$config['max_size']             = 1000000;
			$config['file_name']			= $filename;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image')) {
				$id_ekstrakulikuler = $this->input->post('id_ekstrakulikuler');
				$tanggal = $this->input->post('tanggal');
				$id_kelas = $this->input->post('id_kelas');
				$keterangan = $this->input->post('keterangan');
				$image = $this->upload->data();
				$image = $image['file_name'];

				$data = array(
					'id_ekstrakulikuler' => $id_ekstrakulikuler,
					'tanggal' => $tanggal,
					'id_kelas' => $id_kelas,
					'image' => $image,
					'keterangan' => $keterangan
				);
				$this->m_ekstrakulikuler->edit_kegiatan_ekstrakulikuler($data);
				redirect('ekstrakulikuler/kegiatan_ekstrakulikuler');
			} else {

				echo $this->upload->display_errors();
				//echo "Gagal tambah";
			}
		}
	}

	function delete_kegiatan_ekstrakulikuler($id_kegiatan)
	{
		$data = array('id_kegiatan' => $id_kegiatan);
		$this->m_ekstrakulikuler->delete_kegiatan_ekstrakulikuler($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('ekstrakulikuler/kegiatan_ekstrakulikuler');
	}
}
