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
									<form role="form" action="" method="post">
										<div class="card-body">
											<div class="form-group">
												<label>NIP</label>
												<input type="text" name="id_user" class="form-control" id="id_user" value="<?php echo $data_pengajar->id_user ?>">
											</div>
											<div class="form-group">
												<label>Nama Pengajar</label>
												<input type="text" name="nama_pengajar" class="form-control" id="nama_pengajar" value="<?php echo $data_pengajar->nama_pengajar ?>">
											</div>
											<div class=" row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Jenis Kelamin</label>
														<select class="form-control" id="jenis_kelamin" type="text" name="jenis_kelamin">
															<option value="<?php echo $data_pengajar->jenis_kelamin ?>"><?php echo $data_pengajar->jenis_kelamin ?></option>
															<option value="Laki-laki">Laki - laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Jabatan</label>
														<select class="form-control" id="jabatan" type="text" name="jabatan">
															<option value="<?php echo $data_pengajar->jabatan ?>"><?php echo $data_pengajar->jabatan ?></option>
															<option value="Bendahara">Bendahara</option>
															<option value="Kepala Sekolah">Kepala Sekolah</option>
															<option value="Guru">Guru</option>
															<option value="Guru Mulok">Guru Mulok</option>
															<option value="Guru Qur'an">Guru Qur'an</option>
															<option value="Walas I">Walas I</option>
															<option value="Walas II">Walas II</option>
															<option value="Walas III">Walas III</option>
															<option value="Walas IV">Walas IV</option>
															<option value="Tata Usaha">Tata Usaha</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Tanggal Lahir</label>
														<input type="date" class="form-control float-right" id="tanggal" name="tanggal_lahir" value="<?php echo $data_pengajar->tanggal_lahir ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Tempat Lahir</label>
														<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $data_pengajar->tempat_lahir ?>">
													</div>
												</div>
											</div>
											<div class=" form-group">
												<label>Pendidikan Terakhir</label>
												<input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" value="<?php echo $data_pengajar->pendidikan_terakhir ?>">
											</div>

											<div class=" form-group">
												<label>Fakultas</label>
												<input type="text" name="fakultas" class="form-control" id="fakultas" value="<?php echo $data_pengajar->fakultas ?>">
											</div>
											<div class="form-group">
												<label>Program Studi</label>
												<input type="text" name="program_studi" class="form-control" id="program_studi" value="<?php echo $data_pengajar->program_studi ?>">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Mata Pelajaran</label>
														<select name="id_mapel" class="form-control">
															<option value="<?php echo $data_pengajar->id_mapel ?>"><?php echo $data_pengajar->nama_mapel ?></option>
															<?php foreach ($mata_pelajaran as $key => $value) { ?>
																<option value="<?php echo $value->id_mapel ?>"><?php echo $value->nama_mapel ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Tahun Bertugas</label>
														<input type="text" name="tahun_bertugas" class="form-control" id="tahun_bertugas" value="<?php echo $data_pengajar->tahun_bertugas ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data_pengajar->alamat ?>">
											</div>
											<div class="form-group">
												<label>Nomor Handphone</label>
												<input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo $data_pengajar->no_hp ?>">
											</div>
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
											<button type="reset" class="btn btn-default">Resset</button>
											<button type="submit" class="btn btn-success pull-right" name="submit" onClick="return confirm('Apakah anda yakin ingin mengubah data?')">Update</button>
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
