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
				<div class="row mb-2">
					<div class="col-sm-6">
					</div><!-- /.col -->

				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-sm-12">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">Tambah Data Rombel</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="<?php echo base_url('rombel/tambah_rombel') ?>" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Kelas</label>
										<select name="id_kelas" class="form-control">
											<option value="">--none--</option>
											<?php foreach ($data_kelas as $key => $value) { ?>
												<option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Tahun Ajar</label>
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
										<label>Nama Pengajar</label>
										<select name="id_pengajar" class="form-control">
											<option value="">--none--</option>
											<?php foreach ($data_pengajar as $key => $value) { ?>
												<option value="<?php echo $value->id_pengajar ?>"><?php echo $value->nama_pengajar ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Mata Pelajaran</label>
										<select name="id_mapel" class="form-control">
											<option value="">--none--</option>
											<?php foreach ($mata_pelajaran as $key => $value) { ?>
												<option value="<?php echo $value->id_mapel ?>"><?php echo $value->nama_mapel ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="cancel" class="btn btn-default">Cancel</button>
									<button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
					<!--/.col (left) -->
					<!-- /.row -->
				</div><!-- /.container-fluid -->
		</section>


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
