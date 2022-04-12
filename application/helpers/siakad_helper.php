<?php
function cek_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('tbl_user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];
		$userAccess = $ci->db->get_where('tbl_user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);
		if ($userAccess->num_rows() != $menu_id) {
			redirect('auth/blocked');
		}
	}
}
