<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="bitcoins">
		<div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="about_img">
							<figure><img src="<?php echo base_url('uploads/' . $home_kegiatan_detail->image) ?>" alt="#" /></figure>
						</div>
					</div>
					<div class="col-md-6">
						<div class="titlepage">
							<h1>Kelas: <?php echo $home_kegiatan_detail->nama_kelas ?></h1>
							<p>Tanggal: <?php echo $home_kegiatan_detail->tanggal ?></p><br>
							<p>Agenda: <?php echo $home_kegiatan_detail->keterangan ?></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
</div>
</header>
<div class="row">
	<div class="col-md-12">
		<div class="map">
			<figure><img src="<?php echo base_url('assets/template/home') ?>/images/map-(1).png" alt="#" /></figure>
		</div>
	</div>
</div>
<?php $this->load->view('home/footer') ?>
