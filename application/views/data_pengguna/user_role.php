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
						<h1 class="m-0 text-dark"><?php echo $title ?></h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active"><?php echo $title ?></li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<a href="<?php echo base_url('data_pengguna/tambah_user_role') ?>" class="btn btn-sm btn-success">Tambah data</a>
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
											<th>Role</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($user_role as $key => $value) :
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $value->role; ?></td>
												<td>
													<a href="<?php echo base_url('data_pengguna/edit_user_role/' . $value->id_role); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
													<a href="<?php echo base_url('data_pengguna/delete_user_role/' . $value->id_role); ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
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
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
							</div>
							<div class="col-sm-12 col-md-7">
								<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
									<ul class="pagination">
										<li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
										<li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
										<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
										<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
										<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
										<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
										<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
										<li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
									</ul>
								</div>
							</div>
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
