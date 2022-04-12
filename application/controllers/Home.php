<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_home');
	}

	public function index()
	{
		$data = array(
			'home_artikel' => $this->m_home->total_artikel()
		);
		$this->load->view('home/index', $data);
	}

	public function home_artikel()
	{
		// PAGINATION 

		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/home/home_artikel';
		$config['total_rows'] = $this->m_home->countAllArtikelHome();
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

		$config['attributes'] = array('class' => 'page-link btn-success');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['home_artikel'] = $this->m_home->getArtikelHome($config['per_page'], $data['start']);

		$this->load->view('home/home_artikel', $data);
	}

	public function home_artikel_detail($id_artikel)
	{
		$data = array(
			'title' => 'Detail Artikel',
			'home_artikel_detail' => $this->m_home->home_artikel_detail($id_artikel)
		);

		$this->load->view('home/home_artikel_detail', $data);
	}

	public function home_pengumuman()
	{
		// PAGINATION 

		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/siakad_sdquranuswatunhasanah/home/home_artikel';
		$config['total_rows'] = $this->m_home->countAllArtikelHome();
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

		$config['attributes'] = array('class' => 'page-link btn-success');

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['home_artikel'] = $this->m_artikel->getArtikelHome($config['per_page'], $data['start']);

		$this->load->view('home/home_pengumuman');
	}

	public function home_pengumuman_detail($id_pengumuman)
	{
		$data = array(
			'title' => 'Detail Pengumuman',
			'home_pengumuman_detail' => $this->m_home->home_pengumuman_detail($id_pengumuman)
		);

		$this->load->view('home/home_pengumuman_detail', $data);
	}

	//Ekstrakulikuler
	public function home_ekstrakulikuler()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/home_ekstrakulikuler');
		$config['total_rows'] = count($this->m_home->total_ekstrakulikuler());
		$config['per_page'] = 8;
		$config['uri_segmen'] = 3;

		//limit and start
		$limit = $config['per_page'];
		$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div= class="text-center"><ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_close'] = '</ul></div>';

		$this->pagination->initialize($config);
		$data = array(
			'paginasi' => $this->pagination->create_links(),
			'home_ekstrakulikuler' => $this->m_home->home_ekstrakulikuler($limit, $start)
		);


		$this->load->view('home/home_ekstrakulikuler', $data);
	}

	public function home_kegiatan()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/home_kegiatan');
		$config['total_rows'] = count($this->m_home->total_kegiatan());
		$config['per_page'] = 8;
		$config['uri_segmen'] = 3;

		//limit and start
		$limit = $config['per_page'];
		$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div= class="text-center"><ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_close'] = '</ul></div>';

		$this->pagination->initialize($config);
		$data = array(
			'paginasi' => $this->pagination->create_links(),
			'home_kegiatan' => $this->m_home->home_kegiatan($limit, $start)
		);


		$this->load->view('home/home_kegiatan', $data);
	}

	public function home_kegiatan_detail($id_kegiatan)
	{
		$data = array(
			'title' => 'Detail Kegiatan Ekstrakulikuler',
			'home_kegiatan_detail' => $this->m_home->home_kegiatan_detail($id_kegiatan)
		);

		$this->load->view('home/home_kegiatan_detail', $data);
	}

	public function home_profil()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/home_profil');
		$config['total_rows'] = count($this->m_home->total_profil());
		$config['per_page'] = 8;
		$config['uri_segmen'] = 3;

		//limit and start
		$limit = $config['per_page'];
		$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div= class="text-center"><ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_close'] = '</ul></div>';

		$this->pagination->initialize($config);
		$data = array(
			'paginasi' => $this->pagination->create_links(),
			'home_profil' => $this->m_home->home_profil($limit, $start)
		);


		$this->load->view('home/home_profil', $data);
	}
}
