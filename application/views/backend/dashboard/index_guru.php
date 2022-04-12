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
