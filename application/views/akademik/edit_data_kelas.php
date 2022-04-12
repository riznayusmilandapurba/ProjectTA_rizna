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
								<h3 class="card-title">Tambah Daftar Kelas</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form" action="" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Kelas</label>
										<input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?php echo $data_kelas->nama_kelas ?>">
									</div>
									<div class="form-group">
										<label>Wali Kelas</label>
										<select name="id_pengajar" class="form-control">
											<option value="<?php echo $data_kelas->id_pengajar ?>"><?php echo $data_kelas->nama_pengajar ?></option>
											<?php foreach ($data_pengajar as $key => $value) { ?>
												<option value="<?php echo $value->id_pengajar ?>"><?php echo $value->nama_pengajar ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Tahun Ajar</label>
										<select name="id_ajar" class="form-control">
											<option value="<?php echo $data_kelas->id_ajar ?>"><?php echo $data_kelas->tahun_ajar ?></option>
											<?php foreach ($tahun_ajar as $key => $value) { ?>
												<option value="<?php echo $value->id_ajar ?>"><?php echo $value->tahun_ajar ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
								<!-- /.card-body -->

								<div class="card-footer">
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
