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


				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<!-- left column -->
							<div class="col-sm-12">
								<div class="card card-success">
									<div class="card-header">
										<h3 class="card-title">Tambah Data Siswa</h3>
									</div>
									<!-- /.card-header -->
									<!-- form start -->
									<form role="form" action="<?php echo base_url('pengguna/tambah_data_siswa') ?>" method="post">
										<div class="card-body">
											<div class="form-group">
												<label>NIS</label>
												<input type="text" name="id_user" class="form-control" id="id_user" placeholder="NIS">
											</div>
											<div class="form-group">
												<label>Nama Siswa</label>
												<input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Siswa">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jenis Kelamin</label>
														<select class="form-control" id="jenis_kelamin" type="text" name="jenis_kelamin">
															<option value="">--none--</option>
															<option>Laki - laki</option>
															<option>Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kelas</label>
														<select name="id_kelas" class="form-control">
															<option value="">--none--</option>
															<?php foreach ($data_kelas as $key => $value) { ?>
																<option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>NISN</label>
												<input type="text" name="nisn" class="form-control" id="nisn" placeholder="NISN">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>No Kartu Keluarga</label>
														<input type="text" class="form-control float-right" id="no_kk" name="no_kk" placeholder="No Kartu Keluarga">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>NIK</label>
														<input type="text" name="nik" class="form-control" id="nik" placeholder="NIK">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Tempat Lahir</label>
														<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Tanggal Lahir</label>
														<input type="date" class="form-control float-right" id="tanggal" name="tanggal_lahir">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jalan</label>
														<input type="text" name="jalan" class="form-control" id="jalan" placeholder="Jalan">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kelurahan/Desa</label>
														<input type="text" name="kelurahan" class="form-control" id="kelurahan" placeholder="Kelurahan">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Kecamatan</label>
														<input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kabupaten/Kota</label>
														<input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Provinsi</label>
														<input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Kode Pos</label>
														<input type="text" name="kode_pos" class="form-control" id="kode_pos" placeholder="Kode Pos">
													</div>
												</div>
											</div>
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
											<button type="cancel" class="btn btn-default">Cancel</button>
											<button type="submit" class="btn btn-success pull-right" name="submit">Submit</button>
										</div>
								</div>
								</form>
							</div>
						</div>
						<!--/.col (left) -->
						<!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
			</div>
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
