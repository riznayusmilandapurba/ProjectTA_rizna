<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_rapor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nilai_rapor');
		$this->load->model('m_akademik');
		$this->load->library('form_validation');
	}
	public function nilai()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'title' => 'Input Nilai',
			'nilai_rapor' => $this->m_nilai_rapor->nilai_rapor()
		);
		$this->load->view('nilai_rapor/nilai_rapor', $data);
	}

	public function input_nilai_aksi()
	{
		$id_mapel = $this->input->get('id_mapel', TRUE);
		$id_ajar = $this->input->get('id_ajar', TRUE);
		$id_kelas = $this->input->get('id_kelas', TRUE);
		$this->db->select('tbl_rombel.id_rombel, tbl_data_pengajar.nama_pengajar, tbl_mata_pelajaran.nama_mapel, tbl_data_kelas.nama_kelas,tbl_tahun_ajar.tahun_ajar,tbl_tahun_ajar.semester');
		$this->db->from('tbl_rombel');
		$this->db->join('tbl_data_kelas', 'tbl_data_kelas.id_kelas = tbl_rombel.id_kelas');
		$this->db->join('tbl_mata_pelajaran', 'tbl_mata_pelajaran.id_mapel = tbl_rombel.id_mapel');
		$this->db->join('tbl_data_pengajar', 'tbl_data_pengajar.id_pengajar = tbl_rombel.id_pengajar');
		$this->db->join('tbl_tahun_ajar', 'tbl_tahun_ajar.id_ajar = tbl_rombel.id_ajar');

		$this->db->where('tbl_rombel.id_ajar', $id_ajar);
		$this->db->where('tbl_rombel.id_kelas', $id_kelas);
		$this->db->where('tbl_rombel.id_mapel', $id_mapel);
		$query = $this->db->get()->row();
		$data = array(
			'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
			'list_nilai' => $query,
			'id_mapel' => $id_mapel,
			'id_ajar' => $id_ajar,
			'id_kelas' => $id_kelas,
			'title' => "form nilai"
		);
		$this->load->view('nilai_rapor/form_nilai', $data);
	}

	public function _rulesInputNilai()
	{
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('id_ajar', 'Tahun Ajar', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
	}

	public function input_proses_nilai()
	{

		$this->form_validation->set_rules('nilai_tugas', 'Nilai Rata-rata Tugas', 'required');
		$this->form_validation->set_rules('nilai_uh', 'Nilai Rata-rata Ulangan', 'required');
		$this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required');
		$this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required');

		if ($this->form_validation->run() == false) {
			$data = array(
				'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Tambah Nilai Siswa',
				'input_nilai' => $this->m_nilai_rapor->input_nilai()

			);

			$this->load->view('nilai_rapor/input_proses_nilai', $data);
		} else {
			$data = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'id_ajar' => $this->input->post('id_ajar'),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $this->input->post('id_kelas'),
				'kkm' => 70,
				'nilai_tugas' => $this->input->post('nilai_tugas'),
				'nilai_uh' => $this->input->post('nilai_uh'),
				'nilai_uts' => $this->input->post('nilai_uts'),
				'nilai_uas' => $this->input->post('nilai_uas'),
				'nilai_akhir' => $this->input->post('nilai_akhir'),
				'predikat' => $this->input->post('predikat'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_nilai_rapor->input_proses_nilai($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data sudah berhasil ditambahkan! </div>');
			$id_mapel = $this->input->post('id_mapel', TRUE);
			$id_ajar = $this->input->post('id_ajar', TRUE);
			$id_kelas = $this->input->post('id_kelas', TRUE);

			redirect(base_url() . "nilai_rapor/input_nilai_aksi?id_mapel=" . $id_mapel . "&id_kelas=" . $id_kelas . "&id_ajar=" . $id_ajar);
		}
	}



	public function cetak_rapor()
	{
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Rapor';

		// filename dari pdf ketika didownload
		$file_pdf = 'Rapor';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('nilai_rapor/cetak_rapor', $this->data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}


	public function hapus_nilai()
	{
		$id_nilai = $this->input->get('id_nilai', TRUE);
		$this->db->query("DELETE FROM tbl_nilai_rapor WHERE id_nilai='$id_nilai'");
		echo "<script>history.back()</script>";
	}

	public function view_cetak_rapor()
	{
		$data['title'] = "Cetak Rapor";
		$nisn = $this->input->GET('nisn', TRUE);
		if (!empty($nisn)) {
			$id_ajar = $this->input->GET('id_ajar', TRUE);
			$nilai = $this->db->query("SELECT nama_siswa,tbl_nilai_rapor.*,nama_mapel FROM tbl_nilai_rapor JOIN tbl_data_siswa ON tbl_nilai_rapor.nis=tbl_data_siswa.nisn JOIN tbl_mata_pelajaran ON tbl_mata_pelajaran.id_mapel=tbl_nilai_rapor.id_mapel WHERE nis='$nisn' AND id_ajar='$id_ajar'");
			$result = $nilai->result();
			$data['data'] = $result;
		}

		$this->load->view('nilai_rapor/view_cetak_rapor', $data);
	}

	public function view_cetak_rapor_siswa()
	{
		$data['title'] = "Cetak Rapor";
		$nisn = $this->input->GET('nisn', TRUE);
		if (!empty($nisn)) {
			$id_ajar = $this->input->GET('id_ajar', TRUE);
			$nilai = $this->db->query("SELECT nama_siswa,tbl_nilai_rapor.*,nama_mapel FROM tbl_nilai_rapor JOIN tbl_data_siswa ON tbl_nilai_rapor.nis=tbl_data_siswa.nisn JOIN tbl_mata_pelajaran ON tbl_mata_pelajaran.id_mapel=tbl_nilai_rapor.id_mapel WHERE nis='$nisn' AND id_ajar='$id_ajar'");
			$result = $nilai->result();
			$data['data'] = $result;
		}

		$this->load->view('nilai_rapor/view_cetak_rapor_siswa', $data);
	}

	public function view_cetak_rapor_pdf()
	{
		$data['title'] = "Cetak Rapor";
		$nisn = $this->input->GET('nisn', TRUE);
		if (!empty($nisn)) {
			$id_ajar = $this->input->GET('id_ajar', TRUE);
			$data['siswa'] = $this->db->query("SELECT tbl_data_siswa.nama_siswa, tbl_data_kelas.nama_kelas,tbl_data_siswa.id_kelas,tbl_data_siswa.id_siswa,tbl_data_siswa.nisn FROM tbl_data_siswa JOIN tbl_data_kelas ON tbl_data_siswa.id_kelas=tbl_data_kelas.id_kelas WHERE nisn='$nisn'")->row();
			$data['ajar'] = $this->db->query("SELECT tahun_ajar,semester FROM tbl_tahun_ajar WHERE id_ajar='$id_ajar'")->row();
			$nilai = $this->db->query("SELECT nama_siswa,tbl_nilai_rapor.*,nama_mapel FROM tbl_nilai_rapor JOIN tbl_data_siswa ON tbl_nilai_rapor.nis=tbl_data_siswa.nisn JOIN tbl_mata_pelajaran ON tbl_mata_pelajaran.id_mapel=tbl_nilai_rapor.id_mapel WHERE nis='$nisn' AND id_ajar='$id_ajar'");
			$result = $nilai->result();
			$data['data'] = $result;
		}
		$this->load->view('nilai_rapor/cetak_rapor', $data);
	}

	public function view_cetak_rapor_pdf_guru()
	{
		$data['title'] = "Cetak Rapor";
		$nisn = $this->input->GET('nisn', TRUE);
		if (!empty($nisn)) {
			$id_ajar = $this->input->GET('id_ajar', TRUE);
			$data['siswa'] = $this->db->query("SELECT tbl_data_siswa.nama_siswa, tbl_data_kelas.nama_kelas,tbl_data_siswa.id_kelas,tbl_data_siswa.id_siswa,tbl_data_siswa.nisn FROM tbl_data_siswa JOIN tbl_data_kelas ON tbl_data_siswa.id_kelas=tbl_data_kelas.id_kelas WHERE nisn='$nisn'")->row();
			$data['ajar'] = $this->db->query("SELECT tahun_ajar,semester FROM tbl_tahun_ajar WHERE id_ajar='$id_ajar'")->row();
			$nilai = $this->db->query("SELECT nama_siswa,tbl_nilai_rapor.*,nama_mapel FROM tbl_nilai_rapor JOIN tbl_data_siswa ON tbl_nilai_rapor.nis=tbl_data_siswa.nisn JOIN tbl_mata_pelajaran ON tbl_mata_pelajaran.id_mapel=tbl_nilai_rapor.id_mapel WHERE nis='$nisn' AND id_ajar='$id_ajar'");
			$result = $nilai->result();
			$data['data'] = $result;
		}
		$this->load->view('nilai_rapor/cetak_rapor_guru', $data);
	}
}
