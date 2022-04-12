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
				<i class="fas fa-school"></i> Selamat Datang di Dashboard
			</div>
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-md-4">
						<div class="info-box">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-sticky-note"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Artikel</span>
								<span class="info-box-number">
									<?php echo $total_dataArtikel; ?>
									<small>Data Artikel Tersimpan</small>
								</span>
							</div>

						</div>

					</div>

					<div class="col-12 col-sm-6 col-md-4">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-volume-up"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Pengumuman</span>
								<span class="info-box-number">
									<?php echo $total_dataPengumuman; ?>
									<small>Data Pengumuman Tersimpan</small>
								</span>
							</div>

						</div>

					</div>
					<div class="col-12 col-sm-6 col-md-4">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Kegiatan Ekstrakulikuler</span>
								<span class="info-box-number">
									<?php echo $total_dataKegiatan; ?>
									<small>Data Kegiatan Tersimpan</small>
								</span>
							</div>

						</div>

					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-chart-bar mr-1"></i>
							Jumlah Siswa
						</h3>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content p-0">
							<!-- Morris chart - Sales -->
							<canvas id="myChart" style="height: 100px;"></canvas>
						</div>
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Footer -->
	<?php $this->load->view('backend/template/footer') ?>
</div>
<!-- ./wrapper -->
