<?php
error_reporting(0);
$nilai = get_instance();
$nilai->load->model('m_akademik');
?>
<!-- Meta -->
<?php $this->load->view('backend/template/meta') ?>

<div class="wrapper">

	<!-- Navbar -->
	<?php $this->load->view('backend/template/navbar') ?>


	<!-- Main Sidebar Container -->
	<?php $this->load->view('backend/template/sidebar') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<?php
				if ($list_nilai == null) {
					$query = $this->db->query("SELECT * FROM tbl_tahun_ajar WHERE id_ajar='$id_ajar'");
					$dataAjar = $query->row();
				?>
					<div class="alert alert-danger">
						Maaf mata pelajaran yang anda masukkan <strong>Tidak Tersedia</strong> ditahun ajaran <?php echo $dataAjar->tahun_ajar . "(" . $dataAjar->semester . ")"; ?>
					</div>
				<?php
				} else {  ?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2>Form Pengisian Nilai</h2>
									<div class="row">
										<div class="col-md-3">
											<h6>Tahun Ajar/Semester</h6>
										</div>
										<div class="col-md-4">
											<h6><?= strtoupper($list_nilai->tahun_ajar . "/" . $list_nilai->semester) ?></h6>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<h6>Nama Mapel</h6>
										</div>
										<div class="col-md-4">
											<h6><?= strtoupper($list_nilai->nama_mapel) ?></h6>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<h6>Nama Kelas</h6>
										</div>
										<div class="col-md-4">
											<h6><?= strtoupper($list_nilai->nama_kelas) ?></h6>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">Nama Siswa</th>
													<th scope="col">KKM</th>
													<th scope="col">Nilai Tugas</th>
													<th scope="col">Nilai UH</th>
													<th scope="col">Nilai UTS</th>
													<th scope="col">Nilai UAS</th>
													<th scope="col">Nilai Akhir</th>
													<th scope="col">Nilai Predikat</th>
													<th scope="col">Keterangan</th>
													<th scope="col">Beri Nilai</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = $this->db->query("SELECT nama_siswa,nisn FROM tbl_data_siswa WHERE tbl_data_siswa.id_kelas='$id_kelas'");
												$dataSiswa = $query->result();
												?>
												<?php foreach ($dataSiswa as $i => $d) {
													$query = $this->db->query("SELECT * FROM tbl_nilai_rapor WHERE id_mapel='$id_mapel' AND id_ajar='$id_ajar' AND nis='$d->nisn'");
													$dataSiswa = $query->row();
												?>
													<tr>
														<th scope="row"><?= $i + 1 ?></th>
														<td><?= $d->nama_siswa; ?></td>
														<td><?= $dataSiswa->kkm ?: 0; ?></td>
														<td><?= $dataSiswa->nilai_tugas ?: 0; ?></td>
														<td><?= $dataSiswa->nilai_uh ?: 0; ?></td>
														<td><?= $dataSiswa->nilai_uts ?: 0; ?></td>
														<td><?= $dataSiswa->nilai_uas ?: 0; ?></td>
														<td><?= $dataSiswa->nilai_akhir ?: 0; ?></td>
														<td><?= $dataSiswa->predikat ?: "-"; ?></td>
														<td><?= $dataSiswa->keterangan ?: "-"; ?></td>
														<td>
															<?php if (empty($dataSiswa->nilai_akhir)) { ?>
																<a href="<?php echo base_url('nilai_rapor/input_proses_nilai') . "?id_kelas=" . $id_kelas . "&id_ajar=" . $id_ajar . "&id_mapel=" . $id_mapel . "&nis=" . $d->nisn ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
															<?php } else { ?>
																<a href="<?php echo base_url('nilai_rapor/hapus_nilai') . "?id_nilai=" . $dataSiswa->id_nilai ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
															<?php } ?>
														</td>
													</tr>
												<?php } ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>


				<?php echo anchor('nilai_rapor/nilai', '<div class="btn btn-sm btn-success">Kembali</div>') ?>
			</div>
			<!-- /.content-header -->

			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->



	</div>

	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?php echo base_url('assets/plugins') ?>/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/plugins') ?>/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/plugins') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/template/backend/dist') ?>/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/template/backend/dist') ?>/js/demo.js"></script>
	</body>

	</html>
