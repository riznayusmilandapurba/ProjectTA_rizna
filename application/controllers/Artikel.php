<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_artikel');
		$this->load->library('form_validation');
	}
	public function artikel()
	{
		$judul_artikel = $this->input->get('judul_artikel');
		if ($judul_artikel) {
			$artikel = $this->m_artikel->cariDataArtikel($judul_artikel);
		} else {
			$artikel = $this->m_artikel->artikel();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Artikel',
			'artikel' => $artikel
		);

		//PAGINATION 

		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/artikel/artikel';
		$config['total_rows'] = $this->m_artikel->countAllArtikel();
		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '  </ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['artikel'] = $this->m_artikel->getArtikel($config['per_page'], $data['start']);

		$this->load->view('artikel/artikel', $data);
	}

	public function tambah_artikel()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Artikel',
		);
		$this->load->view('artikel/tambah_artikel', $data);
	}

	public function upload_artikel()
	{
		$filename = $_FILES['image_berita']['name'];
		//var_dump($filename);
		$config['upload_path']          = 'uploads';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['file_name']			= $filename;
		//var_dump($config);
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image_berita')) {

			$judul_artikel = $this->input->post('judul_artikel');
			$tanggal_artikel = $this->input->post('tanggal_artikel');
			$keterangan = $this->input->post('keterangan');
			$image_berita = $this->upload->data();
			$image_berita = $image_berita['file_name'];

			$data = array(
				'judul_artikel' => $judul_artikel,
				'tanggal_artikel' => $tanggal_artikel,
				'id_user' => 1,
				'keterangan' => $keterangan,
				'image_berita' => $image_berita,
			);
			$this->m_artikel->tambah_artikel($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('artikel/artikel');
		} else {

			echo $this->upload->display_errors();
			//echo "Gagal tambah";
		}
	}

	public function edit_artikel($id_artikel)
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Artikel',
			'artikel' => $this->m_artikel->detail_artikel($id_artikel)
		);
		$this->load->view('artikel/edit_artikel', $data);
	}

	public function upload_edit_artikel()
	{

		//var_dump($config);
		// $this->load->library('upload', $config);
		$filename = $_FILES['image_berita']['name'];

		if ($filename == "") {
			$id_artikel = $this->input->post('id_artikel');
			$judul_artikel = $this->input->post('judul_artikel');
			$tanggal_artikel = $this->input->post('tanggal_artikel');
			$keterangan = $this->input->post('keterangan');

			$data = array(
				'id_artikel' => $id_artikel,
				'judul_artikel' => $judul_artikel,
				'tanggal_artikel' => $tanggal_artikel,
				'id_user' => 1,
				'keterangan' => $keterangan,

			);
			$this->m_artikel->edit_artikel($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('artikel/artikel');
		} else {

			//var_dump($filename);
			$config['upload_path']          = 'uploads';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|xlsx';
			$config['max_size']             = 1000000;
			$config['file_name']			= $filename;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image_berita')) {
				$id_artikel = $this->input->post('id_artikel');
				$judul_artikel = $this->input->post('judul_artikel');
				$tanggal_artikel = $this->input->post('tanggal_artikel');
				$keterangan = $this->input->post('keterangan');
				$image_berita = $this->upload->data();
				$image_berita = $image_berita['file_name'];

				$data = array(
					'id_artikel' => $id_artikel,
					'judul_artikel' => $judul_artikel,
					'tanggal_artikel' => $tanggal_artikel,
					'id_user' => 1,
					'keterangan' => $keterangan,
					'image_berita' => $image_berita,
				);
				$this->m_artikel->edit_artikel($data);
				redirect('artikel/artikel');
			} else {

				echo $this->upload->display_errors();
				//echo "Gagal tambah";
			}
		}
	}

	function delete_artikel($id_artikel)
	{
		$data = array('id_artikel' => $id_artikel);
		$this->m_artikel->delete_artikel($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('artikel/artikel');
	}
}
