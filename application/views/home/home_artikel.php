<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="image">
		<img src="<?php echo base_url('assets/template/home') ?>/images/ARTIKEL.png" />
	</div>
</div>
<div class="services">
	<div class="container">
		<div class="row">
			<?php foreach ($home_artikel as $key => $value) : ?>
				<div class="col-md-3 col-sm-6">
					<div id="ho_color" class="card_services h-100">
						<i><img src="<?php echo base_url('uploads/' . $value->image_berita) ?>" alt="#" /></i>
						<div class="card-body">
							<h5><?php echo $value->tanggal_artikel ?></h5>
							<h3><?php echo substr(strip_tags($value->judul_artikel), 0, 15) ?>...</h3>
							<p><?php echo substr(strip_tags($value->keterangan), 0, 100) ?>...</p>
							<a class="read_more" href="<?php echo base_url('home/home_artikel_detail/' . $value->id_artikel) ?>">Read More</a>
						</div>
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			<?php endforeach; ?>
			<div>

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

<!-- end services section -->

<!-- end contact  section -->
<?php $this->load->view('home/footer') ?>
