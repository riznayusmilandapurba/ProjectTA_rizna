<?php $this->load->view('home/meta') ?>
<?php $this->load->view('home/header') ?>
<section class="banner_main">
	<div id="banner1" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#banner1" data-slide-to="1"></li>
			<li data-target="#banner1" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="container-fluid">
					<div class="carousel-caption">
						<div class="row">
							<div class="col-md-12 col-lg-7" ">
								<div class=" text-bg">

								<h1>Sistem Informasi Akademik</h1>
								<span>SD Qur'an <br> Uswatun Hasanah</span>
								<p>"..Berakhlak karimah - berfikir cerdas - <br> mencipta kualitas - menuju Generasi Qur'ani.."</p>

								<div class="row">
									<a class="read_more fas fa-volleyball-ball" href="<?php echo base_url('auth') ?>"><i class="fas fa-user"></i> Login</a>
								</div>
							</div>
						</div>
						<!-- <div class="col-md-12 col-lg-5">
								<div class="text_img">
									<!-- <figure><img src="<?php echo base_url('assets/template/home') ?>/images/c.png" alt="#" /></figure> -->
						<!-- </div> -->
						<!-- </div> -->
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
</section>
</div>
</div>
</header>
<!-- end banner -->
<div class="services">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>


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
					</div>
				</div>


			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="map">
			<figure><img src="<?php echo base_url('assets/template/home') ?>/images/map-(1).png" alt="#" /></figure>
		</div>
	</div>
</div>
</div>
</div>
<!-- end contact  section -->
<?php $this->load->view('home/footer') ?>
