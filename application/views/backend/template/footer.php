<style>
	a {
		color: #28a745;
	}
</style>
<footer class="main-footer">
	<strong>
		<center>Copyright &copy; 2021 <a href="#">SIAKAD SD Qur'an Uswatun Hasanah</a>.</center>
	</strong>
</footer>


<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins') ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/backend/dist') ?>/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/backend/dist') ?>/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins') ?>/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/dist') ?>/dist/js/demo.js"></script>
<script src="<?php echo base_url('assets/template/backend/dist') ?>/dist/js/pages/dashboard3.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins') ?>/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins') ?>/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins') ?>/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins') ?>/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins') ?>/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins') ?>/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins') ?>/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?php echo base_url('assets/template/datepicker') ?>/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url('assets/template/datepicker') ?>/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url('assets/template/datepicker') ?>/js/bootstrap-datepicker.js"></script>
<script>
	initSample();
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(function() {
		$("#tanggal").datepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
<script>
	$(document).ready(function() {
		$.ajax({
			method: "GET",
			url: "<?php echo base_url('admin/get_kelas') ?>",
			dataType: 'json'
		}).done(function(response) {
			var dataResponse = response.kelas
			var label = [];
			var value = [];
			dataResponse.map(data => {
				label.push(data.nama_kelas)
				value.push(parseInt(data.jumlah))
			})
			const ctx = document.getElementById('myChart').getContext('2d');
			const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: label,
					datasets: [{
						label: 'Jumlah Siswa',
						data: value,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
					}
				}
			});
		});
	})
</script>
</body>

</html>
