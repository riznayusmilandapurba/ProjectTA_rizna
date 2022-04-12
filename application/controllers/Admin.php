<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_pengguna');
		// cek_logged_in();
	}
	public function index()
	{
		$data['total_dataArtikel'] = $this->m_data_pengguna->hitungDataArtikel();
		$data['total_dataPengumuman'] = $this->m_data_pengguna->hitungDataPengumuman();
		$data['total_dataKegiatan'] = $this->m_data_pengguna->hitungDataKegiatan();
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'SIAKAD SD Quran Uswatun Hasanah';
		$this->load->view('backend/dashboard/index', $data);
	}

	public function get_kelas()
	{
		$data['kelas'] = $this->db->query("SELECT COUNT(*) as jumlah, nama_kelas FROM tbl_data_siswa JOIN tbl_data_kelas ON tbl_data_siswa.id_kelas=tbl_data_kelas.id_kelas GROUP BY tbl_data_siswa.id_kelas")->result_array();
		echo json_encode($data);
	}
}
