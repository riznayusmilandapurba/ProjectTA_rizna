<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	cek_logged_in();
	// }
	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'SIAKAD SD Quran Uswatun Hasanah';
		$this->load->view('auth/index', $data);
	}
}
