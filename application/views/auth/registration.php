<!-- Auth Header -->
<?php $this->load->view('templates/auth_header') ?>

<!-- Auth Footer -->
<?php $this->load->view('templates/auth_footer') ?>
<style>
	.image img {
		width: 150px;
		margin-left: 87px;
		margin-bottom: 10px;
	}
</style>
<div class="register-box">
	<div class="register-logo">

	</div>

	<div class="card">
		<div class="card-body register-card-body">
			<div class="image">
				<img src="<?php echo base_url(); ?>assets/img/laporan/logo1.png">
			</div>
			<p class="login-box-msg">Buat akun baru</p>

			<form action="<?php echo base_url('auth/registration'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<small class="text-danger"><?php echo form_error('id_user'); ?></small>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?php echo set_value('full-name'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<small class="text-danger"><?php echo form_error('name'); ?></small>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
					<div class=" input-group-append">
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
				<div class="input-group mb-3">
					<input type="password" class="form-control" id="password1" name="password1" placeholder="Konfirmasi Kata Sandi">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<select name="role_id" class="form-control">
						<option value="">--Pilih Level--</option>
						<?php foreach ($user_role as $key => $value) { ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->role ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-success btn-block">Buat Akun</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
<!-- /.register-box -->
