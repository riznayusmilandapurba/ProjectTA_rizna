<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/background') ?>

<div class="row">
	<div class="image pull-right">
		<img src="<?php echo base_url('assets/template/home') ?>/images/p.png" />
	</div>
</div>
<div class="services">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>


			<?php foreach ($home_pengumuman as $key => $value) : ?>

				<div class="col-md-3 col-sm-6">
					<div id="ho_color" class="card_services h-100">
						<div class="card-body">
							<h3><?php echo substr(strip_tags($value->judul_pengumuman), 0, 15) ?>...</h3>
							<p><?php echo substr(strip_tags($value->keterangan), 0, 100) ?>...</p>
							<h5><?php echo $value->tanggal_pengumuman ?></h5>
							<a class="read_more" href="<?php echo base_url('home/home_pengumuman_detail/' . $value->id_pengumuman) ?>">Read More</a>
						</div>
					</div>
				</div>


			<?php endforeach; ?>
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
						<ul class="pagination">
							<?php
							if (isset($paginasi)) {
								echo $paginasi;
							}
							?>
						</ul>
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

<!-- end services section -->

<!-- end contact  section -->
<?php $this->load->view('home/footer') ?>
