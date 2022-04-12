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
								<h3 class="card-title">Tambah Kegiatan Ekstrakulikuler</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<?php echo form_open_multipart('ekstrakulikuler/upload_edit_kegiatan') ?>
							<div class="card-body">
								<div class="form-group">
									<label>Nama Ekstrakulikuler</label>
									<select name="id_ekstrakulikuler" class="form-control">
										<option value="<?php echo $kegiatan_ekstrakulikuler->id_ekstrakulikuler ?>"><?php echo $kegiatan_ekstrakulikuler->nama_ekstrakulikuler ?></option>
										<?php foreach ($data_ekstrakulikuler as $key => $value) { ?>
											<option value="<?php echo $value->id_ekstrakulikuler ?>"><?php echo $value->nama_ekstrakulikuler ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $kegiatan_ekstrakulikuler->tanggal ?>">
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<select name="id_kelas" class="form-control">
										<option value="<?php echo $kegiatan_ekstrakulikuler->id_kelas ?>"><?php echo $kegiatan_ekstrakulikuler->nama_kelas ?></option>
										<?php foreach ($data_kelas as $key => $value) { ?>
											<option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input type="file" class="form-control" name="image">
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<textarea name="keterangan" id="editor"><?php echo $kegiatan_ekstrakulikuler->keterangan ?></textarea>
								</div>

							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="reset" class="btn btn-default">Reset</button>
								<button type="submit" class="btn btn-success pull-right" name="submit" onClick="return confirm('Apakah anda yakin ingin mengubah data?')">Submit</button>
							</div>
							<?php echo form_close()  ?>
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
