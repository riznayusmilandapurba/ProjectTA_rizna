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

			</div><!-- /.container-fluid -->
			<a href="<?php echo base_url('guru') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Dashboard</a>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="alert alert-success" role="alert">
					<i class="fas fa-school"></i> Masuk Input Nilai Rapor
				</div>
				<div class="card-header">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<form role="form" action="<?php echo base_url('nilai_rapor/input_nilai_aksi') ?>" method="GET">
					<div class="card-body">
						<div class="col-sm-12">
							<div class="card card-success">
								<div class="card-body">
									<div class="form-group">
										<label>Tahun Ajar (Semester)</label>
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
									<div class="form-group">
										<label>Masukkan Mata Pelajaran</label>
										<!-- <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" placeholder="Masukkan Mata Pelajaran"> -->
										<?php
										$query = $this->db->query('SELECT * FROM tbl_mata_pelajaran');
										$dropdowns = $query->result();
										?>

										<select name="id_mapel" id="id_mapel" class="form-control">
											<?php foreach ($dropdowns as $dropdown) { ?>
												<option value="<?= $dropdown->id_mapel ?>"><?= $dropdown->nama_mapel  ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Masukkan Kelas</label>
										<!-- <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Masukkan Kelas"> -->
										<?php
										$query = $this->db->query('SELECT * FROM tbl_data_kelas');
										$dropdowns = $query->result();
										?>

										<select name="id_kelas" id="id_kelas" class="form-control">
											<?php foreach ($dropdowns as $dropdown) { ?>
												<option value="<?= $dropdown->id_kelas ?>"><?= $dropdown->nama_kelas  ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-success pull-left">Submit</button>
								</div>
				</form>
			</div>
	</div>
</div>


</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php $this->load->view('backend/template/footer') ?>
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
