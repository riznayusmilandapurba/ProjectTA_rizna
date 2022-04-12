<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="bitcoins">
		<div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="about_img">
							<figure><img src="<?php echo base_url('uploads/' . $home_artikel_detail->image_berita) ?>" alt="#" /></figure>
						</div>
					</div>
					<div class="col-md-6">
						<div class="titlepage">
							<h1><?php echo $home_artikel_detail->judul_artikel ?></h1>
							<p><?php echo $home_artikel_detail->keterangan ?></p>
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
