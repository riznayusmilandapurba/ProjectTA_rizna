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
			<div class="alert alert-success" role="alert">
				<i class="fas fa-school"></i> <?php echo $title ?>
			</div>
		</div>
		<section class="content">
			<div class="card">
				<div class="card-header">

					<form action="" method="GET">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="">Pilih Tahun Ajar</label>
								<?php
								$query = $this->db->query('SELECT id_ajar, semester, CONCAT (tahun_ajar, "/") AS ta_semester FROM tbl_tahun_ajar WHERE status="Aktif"');
								$dropdowns = $query->result();
								?>

								<select name="id_ajar" id="id_ajar" class="form-control">
									<?php foreach ($dropdowns as $dropdown) { ?>
										<option value="<?= $dropdown->id_ajar ?>"><?= $dropdown->ta_semester . " " . $dropdown->semester ?></option>
									<?php } ?>
								</select>
							</div>

							<div hidden class="form-group col-md-4">
								<label for="">
									<option value="<?= $dropdown->nisn ?>"><?= $dropdown->nisn . " - " . strtoupper($dropdown->nama_siswa) ?></option>
								</label>
								<?php
								$dataSession = $this->session->all_userdata();
								if ($dataSession['role_id'] == "3") {
									$id_user = $this->db->query("SELECT id_user FROM tbl_user WHERE email='$dataSession[email]' ")->row();
									$query = $this->db->query("SELECT nisn,nama_siswa FROM tbl_data_siswa WHERE id_user='$id_user->id_user'");
								} else {
									$dataSession = $this->session->all_userdata();
									$id_user = $this->db->query("SELECT id_user FROM tbl_user WHERE email='$dataSession[email]' ")->row();
									$id_pengajar = $this->db->query("SELECT id_pengajar FROM tbl_data_pengajar WHERE id_user='$id_user->id_user' ")->row();
									$id_kelas = $this->db->query("SELECT id_kelas FROM tbl_data_kelas WHERE id_pengajar='$id_pengajar->id_pengajar' ")->row();

									$query = $this->db->query("SELECT nisn,nama_siswa FROM tbl_data_siswa WHERE id_kelas='$id_kelas->id_kelas'");
								}
								$dropdowns = $query->result();
								?>
								<select name="nisn" id="nisn" class="form-control js-example-basic-single">
									<?php foreach ($dropdowns as $dropdown) { ?>
										<option value="<?= $dropdown->nisn ?>"><?= $dropdown->nisn . " - " . strtoupper($dropdown->nama_siswa) ?></option>
									<?php } ?> </option>
								</select>
								<script>
									$('#nisn').val('<?= $_GET['nisn'] ?>').trigger('change');
								</script>
							</div>
							<div class="form-group col-md-2" style="padding-top: 2.3em;">
								<button class="btn btn-success" type="submit"><i class="fas fa-eye"></i></button>
								<button class="btn btn-success" type="button" onclick="printPdf()"><i class="fas fa-print"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<!-- <th scope="col">Nama Siswa</th> -->
									<th scope="col">Nama Mapel</th>
									<th scope="col">KKM</th>
									<th scope="col">Nilai Tugas</th>
									<th scope="col">Nilai UH</th>
									<th scope="col">Nilai UTS</th>
									<th scope="col">Nilai UAS</th>
									<th scope="col">Nilai Akhir</th>
									<th scope="col">Nilai Predikat</th>
									<th scope="col">Keterangan</th>
									<?php if ($dataSession['role_id'] != "3") { ?>
										<th scope="col">Beri Nilai</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $i => $d) {
								?>
									<tr>
										<th scope="row"><?= $i + 1 ?></th>
										<!-- <td><?= $d->nama_siswa; ?></td> -->
										<td><?= $d->nama_mapel; ?></td>
										<td><?= $d->kkm ?: 0; ?></td>
										<td><?= $d->nilai_tugas ?: 0; ?></td>
										<td><?= $d->nilai_uh ?: 0; ?></td>
										<td><?= $d->nilai_uts ?: 0; ?></td>
										<td><?= $d->nilai_uas ?: 0; ?></td>
										<td><?= $d->nilai_akhir ?: 0; ?></td>
										<td><?= $d->predikat ?: "-"; ?></td>
										<td><?= $d->keterangan ?: "-"; ?></td>
										<?php if ($dataSession['role_id'] != "3") { ?>
											<td>
												<?php if (empty($d->nilai_akhir)) { ?>
													<a href="<?php echo base_url('nilai_rapor/input_proses_nilai') . "?id_kelas=" . $id_kelas . "&id_ajar=" . $id_ajar . "&id_mapel=" . $id_mapel . "&nis=" . $d->nisn ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
												<?php } else { ?>
													<a href="<?php echo base_url('nilai_rapor/hapus_nilai') . "?id_nilai=" . $d->id_nilai ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
												<?php } ?>
											</td>
										<?php } ?>
									</tr>
								<?php } ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content-header -->

		<!-- /.content -->

		<!-- /.content-wrapper -->


	</div>
	<!-- Footer -->
	<?php $this->load->view('backend/template/footer') ?>

	<script>
		function printPdf() {
			var id_ajar = $('#id_ajar').val()
			var nisn = $('#nisn').val()
			if (nisn == "") {
				alert("Pilih Siswa Terlebih Dahulu")
				return
			}
			window.open(`<?php echo base_url('nilai_rapor/view_cetak_rapor_pdf') ?>?id_ajar=${id_ajar}&nisn=${nisn}`)
		}
	</script>
