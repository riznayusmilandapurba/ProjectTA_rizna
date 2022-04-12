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
				<i class="fas fa-school"></i> <?php echo $title ?>
			</div>
			<a href="<?php echo base_url('admin') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Dashboard</a>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-header">
					<div class="col-md-3">
						<form>
							<div class="input-group info-group-md">
								<input type="text" class="form-control" style="height: 2.8em;" placeholder="Search by Name" name="nama_siswa" autocomplete="off" autofocus>
								<a class="btn btn-success text-white" type="submit"><i class="fas fa-search"></i></a>
								<?php if ($this->input->get('nama_siswa')) { ?>
									<a href="<?php echo base_url('pengguna/album_alumni') ?>" class="btn btn-danger text-white" type="reset"><i class="fas fa-trash-restore"></i></a>
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
											<th>NIS</th>
											<th>Nama Siswa</th>
											<th>NISN</th>
											<th>Tahun Ajar</th>

											<!-- <th>No Kartu Keluarga</th>
											<th>NIK</th>
											<th>Tempat Lahir</th>
											<th>Tanggal Lahir</th>
											<th>Jalan</th>
											<th>Kelurahan/Desa</th>
											<th>Kecamatan</th>
											<th>Kabupaten</th>
											<th>Provinsi</th>
											<th>Kode Pos</th>
											<th>Aksi</th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($data_alumni as $key => $value) :
										?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $value->id_user; ?></td>
												<td><?php echo $value->nama_siswa; ?></td>
												<td><?php echo $value->nisn; ?></td>
												<td><?php echo $value->tahun_ajar; ?></td>


												<!-- <td>
													<a href="<?php echo base_url('pengguna/edit_data_siswa/' . $value->id_siswa); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
													<a href="<?php echo base_url('pengguna/delete_data_siswa/' . $value->id_siswa); ?>" class=" btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
												</td> -->
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
