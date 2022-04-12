<!-- Meta -->
<?php $this->load->view('backend/template/meta') ?>
<style>
	.page-item.active .page-link {
		z-index: 3;
		color: #fff;
		background-color: #28a745;
		border-color: #28a745;
	}

	.content p a,
	.content ul a,
	.content ol a,
	.content blockquote a,
	.content h1 a,
	.content h2 a,
	.content h3 a,
	.content h4 a,
	.content h5 a {
		color: #28a745;
		text-decoration: none;
		border-bottom: 1px dotted #28a745;
	}
</style>
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
			<a href="<?php echo base_url('admin') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Dashboard</a>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<a href="<?php echo base_url('artikel/tambah_artikel') ?>" class="btn btn-sm btn-success pull-right"><i class="fas fa-plus fa-sm"></i> Tambah artikel</a>
					<div class="col-md-3">
						<form>
							<div class="input-group info-group-md">
								<input type="text" class="form-control" style="height: 2.8em;" placeholder="Search by Name" name="judul_artikel" autocomplete="off" autofocus>
								<a class="btn btn-success text-white" type="submit"><i class="fas fa-search"></i></a>
								<?php if ($this->input->get('judul_artikel')) { ?>
									<a href="<?php echo base_url('artikel/artikel') ?>" class="btn btn-danger text-white" type="reset"><i class="fas fa-trash-restore"></i></a>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
				<div class="card-header">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<div class="card-body">
					<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-6"></div>
							<div class="col-sm-12 col-md-6"></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
									<thead>
										<tr role="row">
											<th>No</th>
											<th>Judul Artikel</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $start = 1; ?>
										<?php
										foreach ($artikel as $key => $value) :
										?>
											<tr>
												<td><?php echo $start++; ?></td>
												<td><?php echo $value->judul_artikel; ?></td>
												<td><?php echo $value->tanggal_artikel; ?></td>
												<td><?php echo $value->keterangan; ?></td>

												<td>
													<a href="<?php echo base_url('artikel/edit_artikel/' . $value->id_artikel); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
													<a href="<?php echo base_url('artikel/delete_artikel/' . $value->id_artikel); ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<?php echo $this->pagination->create_links(); ?>
							</div>
							<!-- <div id="tambah" class="modal fade" role="dialog">
							<div>

							</div>
						</div> -->
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
