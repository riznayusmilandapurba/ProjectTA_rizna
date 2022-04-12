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
			<div class="alert alert-success" role="alert">
				<i class="fas fa-school"></i> Daftar Mata Pelajaran
			</div>
			<a href="<?php echo base_url('admin') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Dashboard</a>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<a href="<?php echo base_url('akademik/tambah_mata_pelajaran') ?>" class="btn btn-sm btn-success pull-right"><i class="fas fa-plus fa-sm"></i> Tambah data</a>
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
											<th>Mata Pelajaran</th>
											<th>KKM</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($mata_pelajaran as $key => $value) :
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $value->nama_mapel; ?></td>
												<td><?php echo $value->kkm; ?></td>
												<td>
													<a href="<?php echo base_url('akademik/edit_mata_pelajaran/' . $value->id_mapel); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
													<a href="<?php echo base_url('akademik/delete_mata_pelajaran/' . $value->id_mapel); ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
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
