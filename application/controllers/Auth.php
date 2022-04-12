<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data_pengguna');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('auth/login');
		} else {

			$this->_login();
		}
	}


	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

		if ($user) {

			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = ['email' => $user['email'], 'role_id' => $user['role_id']];
					$this->session->set_userdata($data);
					// var_dump($this->session->get_userdata('role_id'));

					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						$data = ['id_rombel' => $user['id_rombel']];
						$this->session->set_userdata($data);

						redirect('guru');
					} else {
						redirect('siswa');
					}
				} else {

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password tidak valid! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Alamat email tidak terdaftar. Silahkan buat akun! </div>');
				redirect('auth');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun tidak terdaftar! Silahkan minta ke administrator untuk mendaftar </div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('id_user', 'ID', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', ['is_unique' => 'Alamat Email sudah terdaftar!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password terlalu pendek!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data = array(
				'user_role' => $this->m_data_pengguna->user_role()
			);

			$this->load->view('auth/registration', $data);
		} else {

			$data = [
				'id_user' => $this->input->post('id_user'),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'default.jpg',
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!! User baru berhasil ditambah 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('data_pengguna/register');
		}
	}

	public function edit_registration($id_user)
	{
		$data = array(
			'user_role' => $this->m_data_pengguna->user_role(),
			'register' => $this->m_data_pengguna->detail_register($id_user)

		);
		// $this->form_validation->set_rules('id_user', 'ID User', 'required|trim');
		// $this->form_validation->set_rules('name', 'Name', 'required|trim');
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', ['is_unique' => 'Alamat Email sudah terdaftar!']);
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password1]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password terlalu pendek!']);
		$this->form_validation->set_rules('password1', 'Password', 'trim|matches[password]');
		// $this->form_validation->set_rules('role_id', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/edit_registration', $data);
		} else {

			$data = array(
				'id_user' => $id_user,
				'name' => $this->input->post('name'),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'default.jpg',
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'is_active' => 1,
				'date_created' => time()
			);

			$this->m_data_pengguna->edit_registration($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
			redirect('data_pengguna/register');
		}
	}

	function delete_registration($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->m_data_pengguna->delete_registration($data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus! 
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span></button></div>');
		redirect('data_pengguna/register');
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Keluar <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('auth');
	}

	public function blocked()
	{
		echo 'access blocked!!';
	}
}
