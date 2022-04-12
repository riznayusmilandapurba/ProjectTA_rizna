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
							<div class="card-header col-">
								<h3 class="card-title">Edit Artikel</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->

							<?php echo form_open_multipart('artikel/upload_edit_artikel') ?>
							<div class="card-body">
								<input type="hidden" name="id_artikel" class="form-control" id="id_artikel" value="<?php echo $artikel->id_artikel ?>">

								<div class="form-group">
									<label>Judul Artikel</label>
									<input type="text" name="judul_artikel" class="form-control" id="judul_artikel" value="<?php echo $artikel->judul_artikel ?>">
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal_artikel" class="form-control" id="tanggal_artikel" value="<?php echo $artikel->tanggal_artikel ?>">
								</div>

								<div class="form-group">
									<label>Keterangan</label>
									<textarea name="keterangan" id="editor"><?php echo $artikel->keterangan ?></textarea>
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input type="file" class="form-control" name="image_berita">
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
