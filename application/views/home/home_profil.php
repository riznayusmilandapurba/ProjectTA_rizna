<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="bitcoins">
		<div>
			<?php foreach ($home_profil as $key => $value) : ?>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="about_img">
								<figure><img src="<?php echo base_url('uploads/' . $value->image_profil) ?>" alt="#" /></figure>
							</div>
						</div>
						<div class="col-md-6">
							<div class="titlepage">
								<strong>
									<h1><?php echo $value->nama_profil ?></h1>
								</strong>
								<p><?php echo $value->keterangan ?></p>
							</div>
						</div>
					</div>
				</div>

		</div>
	<?php endforeach; ?>
	</div>

	<!-- <div class="image">
		<img src="<?php echo base_url('assets/template/home') ?>/images/p.png" />
	</div> -->
</div>

</div>
</div>
</header>

<!-- about section -->
<!-- services section -->


</div>
<div class="row">
	<div class="col-md-12">
		<div class="map">
			<figure><img src="<?php echo base_url('assets/template/home') ?>/images/map-(1).png" alt="#" /></figure>
		</div>
	</div>
</div>
<!-- about section -->
<!-- end services section -->

<!-- end contact  section -->
<?php $this->load->view('home/footer') ?>
