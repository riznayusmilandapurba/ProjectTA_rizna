<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_pengguna');
		$this->load->library('form_validation');
	}

	public function register()
	{
		$role_id = $this->input->get('role_id');
		if ($role_id) {
			$register = $this->m_data_pengguna->cariDataPengguna($role_id);
		} else {
			$register = $this->m_data_pengguna->register();
		}
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Data Pengguna',
			'register' => $register
		);

		//PAGINATION 

		// $this->load->library('pagination');
		// $config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/data_pengguna/register';
		// $config['total_rows'] = $this->m_data_pengguna->countAllPengguna();
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
		// $data['register'] = $this->m_data_pengguna->getPengguna($config['per_page'], $data['start']);

		$this->load->view('data_pengguna/register', $data);
	}

	public function user_role()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Semester',
			'user_role' => $this->m_data_pengguna->user_role()
		);
		$this->load->view('data_pengguna/user_role', $data);
	}
}
