<!-- Meta -->
<?php $this->load->view('backend/template/meta') ?>
<style>
	.image_das img {
		margin-top: 55px;
		width: 300px;
		margin-left: 400px;
		margin-bottom: 10px;
	}
</style>
<div class="wrapper">

	<!-- Navbar -->
	<?php $this->load->view('backend/template/navbar') ?>


	<!-- Main Sidebar Container -->
	<?php $this->load->view('backend/template/sidebar') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="image_das">
			<img src="<?php echo base_url(); ?>assets/img/laporan/logo1.png">
		</div>
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<center>
					<h1 class="text-success">مرحبًا بك في لوحة تحكم الطالب</h1>
					<a class="text-success">"..Berakhlak karimah - berfikir cerdas - mencipta kualitas - menuju Generasi Qur'ani.."</a>
				</center>
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->

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
