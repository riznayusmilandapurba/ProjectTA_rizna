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

					</div><!-- /.col -->

				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<!-- left column -->
							<div class="col-sm-12">
								<div class="card card-success">
									<div class="card-header">
										Input Nilai Siswa
									</div>
									<!-- /.card-header -->
									<!-- form start -->
									<form role="form" action="<?php echo base_url('nilai_rapor/input_proses_nilai') ?>" method="post">
										<input type="hidden" name="id_mapel" id="id_mapel" value="<?= $_GET['id_mapel'] ?>">
										<input type="hidden" name="id_ajar" id="id_ajar" value="<?= $_GET['id_ajar'] ?>">
										<input type="hidden" name="id_kelas" id="id_kelas" value="<?= $_GET['id_kelas'] ?>">
										<input type="hidden" name="nis" id="nis" value="<?= $_GET['nis'] ?>">
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Rata-rata Nilai Tugas</label>
											<input type="number" class="form-control" placeholder="Rata-rata Nilai Tugas" name="nilai_tugas" id="nilai_tugas">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Rata-rata Nilai Ulangan</label>
											<input type="number" class="form-control" placeholder="Rata-rata Nilai Ulangan" name="nilai_uh" id="nilai_uh">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Nilai UTS</label>
											<input type="number" class="form-control" placeholder="Nilai UTS" name="nilai_uts" id="nilai_uts">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Nilai UAS</label>
											<input type="number" class="form-control" placeholder="Nilai UAS" name="nilai_uas" id="nilai_uas">
										</div>
									</div>


								</div>
								<div class="card">
									<div class="card-body ">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Nilai Akhir</label>
													<input type="text" name="nilai_akhir" class="form-control" id="nilai_akhir" readonly value="" style="color:black;">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Predikat</label>
													<input type="text" name="predikat" class="form-control" id="predikat" readonly value="" style="color:black;">
												</div>
											</div>
											<div class=" col-md-4">
												<div class="form-group">
													<label>Keterangan</label>
													<input type="text" name="keterangan" class="form-control" id="keterangan" readonly value="" style="color:black;">
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<!-- /.card-body -->

							<div>
								<?php echo anchor('nilai_rapor/nilai', '<div style="font-size: 17px;" class="btn btn-sm btn-success">Kembali</div>') ?>
								<button type="submit" class="btn btn-success pull-right ml-2" name="submit">Submit</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<!--/.col (left) -->
				<!-- /.row -->
			</div><!-- /.container-fluid -->
	</div>
</div>
</section>


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
<script type="text/javascript">
	$(function() {
		function nilaiRapor() {
			var nilai_akhir = nilai_akhir || 0;
			var nilai_tugas = $("#nilai_tugas").val();
			//console.log(nilai_tugas);
			var nilai_uh = $("#nilai_uh").val();
			var nilai_uts = $("#nilai_uts").val();
			var nilai_uas = $("#nilai_uas").val();
			var nilai_akhir = (Math.round((parseInt(nilai_tugas) + parseInt(nilai_uh) + parseInt(nilai_tugas) + parseInt(nilai_uas)) / 4).toFixed(2));
			//console.log(nilai_akhir);
			//console.log(nilai_akhir);
			if (isNaN(nilai_akhir)) {
				return 0;
			} else {
				$("#nilai_akhir").val(nilai_akhir);
			}

			//var nilai_akhir = $("#nilai_akhir").val();
			//console.log(nilai_akhir);
			if (nilai_akhir <= 50) {
				$("#keterangan").val("Tidak Tuntas");
				$("#predikat").val('E');
			} else if (nilai_akhir >= 50 && nilai_akhir <= 60) {
				$("#keterangan").val("Tidak Tuntas");
				$("#predikat").val('D');
			} else if (nilai_akhir >= 60 && nilai_akhir <= 75) {
				$("#keterangan").val("Tidak Tuntas");
				$("#predikat").val('C');
			} else if (nilai_akhir >= 75 && nilai_akhir <= 80) {
				$("#keterangan").val("Tuntas");
				$("#predikat").val('B');
			} else if (nilai_akhir >= 80 && nilai_akhir <= 100) {
				$("#keterangan").val("Tuntas");
				$("#predikat").val('A');
			} else if (nilai_akhir < 50) {
				$("#keterangan").val("Tidak Tuntas");
				$("#predikat").val('E');
			} else {
				$("#keterangan").val('');
				$("#predikat").val('');
			}
			// $("#keterangan").val(keterangan);
			// $("#predikat").val(predikat);
			//console.log(predikat);
		}


		$("#nilai_tugas, #nilai_uh, #nilai_uts, #nilai_uas").keyup(function() {
			nilaiRapor();
		});
	});
</script>

<!-- <script type="text/javascript">
		$(document).ready(function() {
			$("#nilai_tugas, #nilai_uh, #nilai_uts, #nilai_uas").keyup(function() {
				var nilai_tugas = $("#nilai_tugas").val();
				//console.log(nilai_tugas);
				var nilai_uh = $("#nilai_uh").val();
				var nilai_uts = $("#nilai_uts").val();
				var nilai_uas = $("#nilai_uas").val();
				var nilai_akhir = (Math.round((parseInt(nilai_tugas) + parseInt(nilai_uh) + parseInt(nilai_tugas) + parseInt(nilai_uas) / 4)).toFixed(2));
				//console.log(nilai_akhir);
				$("#nilai_akhir").val(nilai_akhir);
		
				//var nilai_akhir = $("#nilai_akhir").val();
				//console.log(nilai_akhir);
				if (nilai_akhir <= 50) {
					$("#keterangan").val("Tidak Tuntas");
					$("#predikat").val('E');
				} else if (nilai_akhir >= 50 && nilai_akhir <= 60) {
					$("#keterangan").val("Tidak Tuntas");
					$("#predikat").val('D');
				} else if (nilai_akhir >= 60 && nilai_akhir <= 75) {
					$("#keterangan").val("Tidak Tuntas");
					$("#predikat").val('C');
				} else if (nilai_akhir >= 75 && nilai_akhir <= 80) {
					$("#keterangan").val("Tuntas");
					$("#predikat").val('B');
				} else if (nilai_akhir >= 80 && nilai_akhir <= 100) {
					$("#keterangan").val("Tuntas");
					$("#predikat").val('A');
				} else if (nilai_akhir < 50) {
					$("#keterangan").val("Tidak Tuntas");
					$("#predikat").val('E');
				} else {
					$("#keterangan").val('');
					$("#predikat").val('');
				}
				// $("#keterangan").val(keterangan);
				// $("#predikat").val(predikat);
				//console.log(predikat);

			});
		});
	</script> -->

</body>

</html>
<!-- function tampil() {
			var tugas = document.getElementById("nilai_tugas").value;
			var tugas1 = parseInt(tugas);
			var uh = document.getElementById("nilai_uh").value;
			var uh1 = parseInt(uh);
			var uas = document.getElementById("nilai_uas").value;
			var uas1 = parseInt(uas);
			var uts = document.getElementById("nilai_uts").value;
			var uts1 = parseInt(uts);
			var rata = (tugas1 + uh1 + uas1 + uts1) / 4;
			if (rata <= 50) {
				$('#keterangan').val('Tidak Tuntas');
				$('#predikat').val('E');
			} else if (rata >= 50 && rata <= 60) {
				$('#keterangan').val('Tidak Tuntas');
				$('#predikat').val('D');
			} else if (rata >= 60 && rata <= 75) {
				$('#keterangan').val('Tidak Tuntas');
				$('#predikat').val('C');
			} else if (rata >= 75 && rata <= 80) {
				$('#keterangan').val('Tuntas');
				$('#predikat').val('B');
			} else if (rata >= 80 && rata <= 100) {
				$('#keterangan').val('Tuntas');
				$('#predikat').val('A');
			} else if (rata < 50) {
				$('#keterangan').val('Tidak Tuntas');
				$('#predikat').val('E');
			} else {
				$('#keterangan').val('');
				$('#predikat').val('');
			}
			document.getElementById("tampil").innerHTML = "<b>" + rata + "</b>";
		} -->
