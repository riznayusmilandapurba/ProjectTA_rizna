<!-- Auth Header -->
<?php $this->load->view('templates/auth_header') ?>

<!-- Auth Footer -->
<?php $this->load->view('templates/auth_footer') ?>
<style>
	.image img {
		width: 150px;
		margin-left: 89px;
		margin-bottom: 10px;
	}

	.login-page {
		align-items: center;
		/* background-color: $gray-200; */
		display: flex;
		flex-direction: column;
		height: 100vh;
		justify-content: center;
		background: url(../siakad_sdquranuswatunhasanah/assets/template/backend/images/sekolah.png);
		margin-top: 80px;
	}
</style>

<div class="header">
	<div>

	</div>

	<!-- /.login-logo -->
	<div class="login-logo">

	</div>

	<div class="card ">
		<div class="card-body login-card-body">
			<div class="image">
				<img src="<?php echo base_url(); ?>assets/img/laporan/logo1.png">
			</div>
			<div class="login-logo">
				<a style="font-size: 30px;">
					SD Qur'an Uswatun Hasanah
				</a>
			</div>
			<p class="login-box-msg">Selamat Datang</p>

			<?php echo $this->session->flashdata('message'); ?>

			<form action="<?php echo base_url('auth'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<small class="text-danger"><?php echo form_error('email'); ?></small>
				<div class="input-group mb-3">
					<input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<small class="text-danger"><?php echo form_error('password'); ?></small>

				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-success btn-block">Masuk</button>
				</div>
				<!-- /.col -->
		</div>
		</form>
	</div>
	<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->
