<style>
	.btn-group {
		float: right;
		background-color: transparent;
	}

	.btn {
		background-color: transparent;
	}

	.dropdown-toggle {
		margin: 0 23px;
		color: #037b36;
		font-size: 15px;
		line-height: 20px;
		font-weight: 600;
		/* text-transform: uppercase; */
		padding: 0 0 3px 0;
		position: relative;
	}

	.dropdown-item {
		color: #037b36;
		font-size: 15px;
		line-height: 20px;
		font-weight: 600;
	}

	.dropdown-item:hover {
		background-color: #fbca47 !important;
		color: #fff;
	}
</style>
<!-- header -->
<header>
	<!-- header inner -->
	<div class="header">
		<div class="white_bg1">
			<div>
				<div class="row">
					<div>

						<a><img src="<?php echo base_url('assets/template/home') ?>/images/logo.png" alt="#" /></a>



					</div>

					<nav class="navigation navbar navbar-expand-md navbar-dark ">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarsExample04">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('') ?>"> Home </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('home/home_artikel') ?>">Artikel</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('home/home_pengumuman') ?>">Pengumuman </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('home/home_profil') ?>">Profil</a>
								</li>
								<li class="nav-item">
									<div class="btn-group">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ekstrakulikuler
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="<?php echo base_url('home/home_ekstrakulikuler') ?>">Ekstrakulikuler</a>
											<a class="dropdown-item" href="<?php echo base_url('home/home_kegiatan') ?>">Kegiatan Ekstrakulikuler</a>
										</div>
									</div>
								</li>
								<li class="nav-item d_none le_co">
									<!-- <a class="nav-link" href="<?php echo base_url('auth') ?>"><i class="fa fa-user" aria-hidden="true"></i> Login</a> -->
								</li>
							</ul>
						</div>
					</nav>

				</div>
			</div>
			<!-- end header inner -->
			<!-- end header -->
			<!-- banner -->
