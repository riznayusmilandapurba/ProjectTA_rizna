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
					<a href="<?php echo base_url('nilai_rapor/cetak_rapor') ?>" class="btn btn-sm btn-success fas fa-print">Cetak PDF</a>
				</div>
				<div class="card-header">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<div class="card-body">
					<table class="table table-bordered text-center" id="tabel_siswa" dataTables_filter="10">
						<thead>
							<tr>
								<th width="2%" rowspan="2" style="vertical-align:middle;">No</th>
								<th width="10%" rowspan="2" style="vertical-align:middle;">Mata Pelajaran</th>

								<th colspan="2">Nilai Rata-Rata</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Nilai UTS</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Nilai UAS</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Nilai Akhir</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Predikat</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Keterangan</th>
								<th width="4%" rowspan="2" style="vertical-align:middle;">Aksi</th>
							</tr>
							<tr>
								<td width="2%">UH<br></td>
								<td width="2%">TUGAS</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($input_nilai as $key => $value) : ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $value->nama_mapel; ?></td>
									<td><?php echo $value->nilai_tugas; ?></td>
									<td><?php echo $value->nilai_uh; ?></td>
									<td><?php echo $value->nilai_uts; ?></td>
									<td><?php echo $value->nilai_uas; ?></td>
									<td><?php echo $value->nilai_akhir; ?></td>
									<td><?php echo $value->predikat; ?></td>
									<td><?php echo $value->keterangan; ?></td>
									<td>
										<a href="<?php echo base_url('pengguna/edit_data_pengajar/' . $value->id_nilai); ?>" class="btn btn-xs btn-success"><i class="far fa-edit"></i></a>
										<a href="<?php echo base_url('pengguna/delete_data_pengajar/' . $value->id_nilai); ?>" class=" btn btn-xs btn-success"><i class="far fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>



			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Footer -->

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
