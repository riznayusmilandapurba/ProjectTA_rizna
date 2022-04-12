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
								<h3 class="card-title">Edit Tahun Ajar</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Tahun Ajar</label>
										<input type="text" name="tahun_ajar" class="form-control" id="tahun_ajar" value="<?php echo $tahun_ajar->tahun_ajar ?>">
									</div>
									<div class="form-group">
										<label>Semester</label>
										<select class="form-control" id="semester" type="text" name="semester">
											<option value="<?php echo $tahun_ajar->semester ?>"><?php echo $tahun_ajar->semester ?></option>
											<option>Ganjil</option>
											<option>Genap</option>
										</select>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" id="status" type="text" name="status">
											<option value="<?php echo $tahun_ajar->status ?>"><?php echo $tahun_ajar->status ?></option>
											<option>Aktif</option>
											<option>Tidak Aktif</option>
										</select>
									</div>
								</div>
								<!-- /.card-body -->

								<div class=" card-footer">
									<button type="reset" class="btn btn-default">Reset</button>
									<button type="submit" class="btn btn-success pull-right" name="submit" onClick="return confirm('Apakah anda yakin ingin mengubah data?')">Update</button>
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
