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
					<a href="<?php echo base_url('pengguna/tambah_data_pengajar') ?>" class="btn btn-sm btn-success pull-right"><i class="fas fa-plus fa-sm"></i> Tambah data</a>
					<div class="col-md-3">
						<form>
							<div class="input-group info-group-md">
								<input type="text" class="form-control" style="height: 2.8em;" placeholder="Search by Name" name="nama_pengajar" autocomplete="off" autofocus>
								<a class="btn btn-success text-white" type="submit"><i class="fas fa-search"></i></a>
								<?php if ($this->input->get('nama_pengajar')) { ?>
									<a href="<?php echo base_url('pengguna/data_pengajar') ?>" class="btn btn-danger text-white" type="reset"><i class="fas fa-trash-restore"></i></a>
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
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table id=" example2" class="table table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
									<thead>
										<tr role="row">
											<th>No</th>
											<th>NIP</th>
											<th>Nama Pengajar</th>
											<th>Jenis Kelamin</th>
											<th>Jabatan</th>
											<th>Tanggal Lahir</th>
											<th>Tempat Lahir</th>
											<th>Pendidikan Terakhir</th>
											<th>Fakultas</th>
											<th>Program Studi</th>
											<th>Mapel Dikuasai</th>
											<th>Tahun Bertugas</th>
											<th>Alamat</th>
											<th>No. Handphone</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $start = 1; ?>
										<?php
										foreach ($data_pengajar as $key => $value) :
										?>
											<tr>
												<td><?php echo $start++; ?></td>
												<td><?php echo $value->id_user; ?></td>
												<td><?php echo $value->nama_pengajar; ?></td>
												<td><?php echo $value->jenis_kelamin; ?></td>
												<td><?php echo $value->jabatan; ?></td>
												<td><?php echo $value->tanggal_lahir; ?></td>
												<td><?php echo $value->tempat_lahir; ?></td>
												<td><?php echo $value->pendidikan_terakhir; ?></td>
												<td><?php echo $value->fakultas; ?></td>
												<td><?php echo $value->program_studi; ?></td>
												<td><?php echo $value->nama_mapel; ?></td>
												<td><?php echo $value->tahun_bertugas; ?></td>
												<td><?php echo $value->alamat; ?></td>
												<td><?php echo $value->no_hp; ?></td>
												<td>
													<a href="<?php echo base_url('pengguna/edit_data_pengajar/' . $value->id_pengajar); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
													<a href="<?php echo base_url('pengguna/delete_data_pengajar/' . $value->id_pengajar); ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data?')" class=" btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
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
