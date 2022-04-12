<!-- Main Sidebar Container -->
<style>
	.img {
		margin-top: 10px;
		width: 80px;
		margin-left: 65px;
		margin-bottom: 10px;
	}
</style>
<aside class="main-sidebar bg-success elevation-4">

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->

		<div class="img">
			<img src="<?php echo base_url(); ?>assets/img/laporan/logo1.png">
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<!-- Dashboard -->

				<!-- Query -->

				<?php
				$role_id = $this->session->userdata('role_id');
				$queryMenu = "SELECT * FROM `tbl_user_menu` 
								INNER JOIN tbl_user_access_menu 
								ON tbl_user_menu.id = tbl_user_access_menu.menu_id
								WHERE tbl_user_access_menu.role_id = $role_id";
				$menu = $this->db->query($queryMenu)->result_array();

				?>
				<!-- Looping Menu -->
				<?php foreach ($menu as $m) : ?>
					<div class="sidebar-heading ">
						<div class="nav-link bg-white fas fa-users-cog">
							<?php echo $m['menu'] ?>
						</div>

					</div>
					<?php
					$menuId = $m['id'];
					$querySubMenu = "SELECT *
										FROM `tbl_user_sub_menu` JOIN `tbl_user_menu` 
											ON `tbl_user_sub_menu`.`menu_id` = `tbl_user_menu`.`id`
					 					  WHERE `tbl_user_sub_menu`.`menu_id` = $menuId
					  						 AND `tbl_user_sub_menu`.`is_active` = 1
					";
					$subMenu = $this->db->query($querySubMenu)->result_array();
					?>
					<hr class="sidebar-divider">
					<?php foreach ($subMenu as $sm) : ?>
						<li class="nav-item ">
							<a href="<?php echo base_url($sm['url']); ?>" class="nav-link bg-success">
								<i class="<?php echo ($sm['icon']); ?>"></i>
								<p>
									<?php echo ($sm['title']); ?>
								</p>
							</a>
						</li>

					<?php endforeach; ?>
				<?php endforeach; ?>

				<li class="nav-header">MENU LAINNYA</li>
				<li class="nav-item">
					<a href="<?php echo base_url('auth/logout'); ?>" class="nav-link bg-success" onClick="return confirm('Apakah anda yakin ingin keluar?')">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							LogOut
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
