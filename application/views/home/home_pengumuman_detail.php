<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="bitcoins">
		<div>
			<div class="container">
				<div>
					<div class="titlepage">
						<h1><?php echo $home_pengumuman_detail->judul_pengumuman ?></h1>
						<p><?php echo $home_pengumuman_detail->tanggal_pengumuman ?></p>
						<p><?php echo $home_pengumuman_detail->tanggal_pengumuman ?></p>
						<p><?php echo $home_pengumuman_detail->keterangan ?></p>
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
<!-- about section -->
<!-- services section -->

<!-- about section -->
<!-- end services section -->

<!-- end contact  section -->
<?php $this->load->view('home/footer') ?>
