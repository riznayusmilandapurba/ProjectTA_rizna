<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil');
		$this->load->library('form_validation');
	}
	public function profil()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Profil',
			'profil' => $this->m_profil->profil()
		);
		$this->load->view('profil/profil', $data);
	}

	public function tambah_profil()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Tambah Profil',
		);
		$this->load->view('profil/tambah_profil', $data);
	}

	public function upload_profil()
	{
		$filename = $_FILES['image_profil']['name'];
		//var_dump($filename);
		$config['upload_path']          = 'uploads';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['file_name']			= $filename;
		//var_dump($config);
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image_profil')) {

			$nama_profil = $this->input->post('nama_profil');
			$keterangan = $this->input->post('keterangan');
			$image_profil = $this->upload->data();
			$image_profil = $image_profil['file_name'];

			$data = array(
				'nama_profil' => $nama_profil,
				'keterangan' => $keterangan,
				'id_user' => 1,
				'image_profil' => $image_profil
			);
			$this->m_profil->tambah_profil($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('profil/profil');
		} else {

			echo $this->upload->display_errors();
			//echo "Gagal tambah";
		}
	}

	public function edit_profil($id_profil)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Edit Profil',
			'profil' => $this->m_profil->detail_profil($id_profil)
		);
		$this->load->view('profil/edit_profil', $data);
	}

	public function upload_edit_profil()
	{
		$filename = $_FILES['image_berita']['name'];

		if ($filename == "") {
			$id_profil = $this->input->post('id_profil');
			$nama_profil = $this->input->post('nama_profil');
			$keterangan = $this->input->post('keterangan');

			$data = array(
				'id_profil' => $id_profil,
				'nama_profil' => $nama_profil,
				'keterangan' => $keterangan,
				'id_user' => 1
			);
			$this->m_profil->edit_profil($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('profil/profil');
		} else {
			$config['upload_path']          = 'uploads';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10000;
			$config['file_name']			= $filename;
			//var_dump($config);
			// $this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image_profil')) {

				$id_profil = $this->input->post('id_profil');
				$nama_profil = $this->input->post('nama_profil');
				$keterangan = $this->input->post('keterangan');
				$image_profil = $this->upload->data();
				$image_profil = $image_profil['file_name'];

				$data = array(
					'id_profil' => $id_profil,
					'nama_profil' => $nama_profil,
					'keterangan' => $keterangan,
					'id_user' => 1,
					'image_profil' => $image_profil
				);
				$this->m_profil->edit_profil($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
				redirect('profil/profil');
			} else {

				echo $this->upload->display_errors();
				//echo "Gagal tambah";

			}
		}
	}

	public function delete_profil($id_profil)
	{
		$data = array('id_profil' => $id_profil);
		$this->m_profil->delete_profil($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('profil/profil');
	}
}
