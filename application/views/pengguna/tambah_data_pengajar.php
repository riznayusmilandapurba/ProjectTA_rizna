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
										<h3 class="card-title">Data Pengajar</h3>
									</div>
									<!-- /.card-header -->
									<!-- form start -->
									<form role="form" action="<?php echo base_url('pengguna/tambah_data_pengajar') ?>" method="post">
										<div class="card-body">
											<div class="form-group">
												<label>NIP</label>
												<input type="text" name="id_user" class="form-control" id="id_user" placeholder="NIP">
											</div>
											<div class="form-group">
												<label>Nama Pengajar</label>
												<input type="text" name="nama_pengajar" class="form-control" id="nama_pengajar" placeholder="Nama Pengajar">
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
														<label>Jabatan</label>
														<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">

													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Tanggal Lahir</label>

														<input type="date" class="form-control float-right" id="tanggal" name="tanggal_lahir">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Tempat Lahir</label>
														<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
													</div>
												</div>
											</div>


											<div class="form-group">
												<label>Pendidikan Terakhir</label>
												<input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir">
											</div>

											<div class="form-group">
												<label>Fakultas</label>
												<input type="text" name="fakultas" class="form-control" id="fakultas" placeholder="Fakultas">
											</div>
											<div class="form-group">
												<label>Program Studi</label>
												<input type="text" name="program_studi" class="form-control" id="program_studi" placeholder="Program Studi">
											</div>
											<div class="row">
												<div class="col-md-6">
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
												<div class="col-md-6">
													<div class="form-group">
														<label>Tahun Bertugas</label>
														<input type="text" name="tahun_bertugas" class="form-control" id="tahun_bertugas" placeholder="Tahun Bertugas">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
											</div>
											<div class="form-group">
												<label>Nomor Handphone</label>
												<input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor Handphone">
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
