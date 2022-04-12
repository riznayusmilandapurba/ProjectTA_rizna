<!-- Auth Header -->
<?php $this->load->view('templates/auth_header') ?>

<!-- Auth Footer -->
<?php $this->load->view('templates/auth_footer') ?>

<div class="register-box">


	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg">Edit akun</p>
			<div class="input-group mb-3">
				<input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $register->id_user ?>" readonly>
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>

			<form role="form" action="" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $register->name ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $register->email ?>">
					<div class=" input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" id="password" name="password" value="<?php echo $register->password ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" id="password1" name="password1" placeholder="Konfirmasi Kata Sandi ">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<select name="role_id" class="form-control">
						<option value="<?php echo $register->role_id ?>"><?php echo $register->role ?></option>
						<?php foreach ($user_role as $key => $value) { ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->role ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-success btn-block" onClick="return confirm('Apakah anda yakin ingin mengubah data?')">Update</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
<!-- /.register-box -->
