<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-code"></i>
		</div>
		<div class="sidebar-brand-text mx-3"><?= $title; ?></div>
	</a>
	<hr class="sidebar-divider">
	<?php
		$role = $this->session->userdata('role');
		$queryMenuMain = "SELECT `menu_main`.`title`,`slug` FROM `menu_main` JOIN `menu_access` ON `menu_main`.`slug` = `menu_access`.`menu_main_slug` WHERE `menu_access`.`auth_role_slug` = '$role'";
		$mainMenus = $this->db->query($queryMenuMain)->result_array();
	?>
	<?php foreach ($mainMenus as $mainMenu) : ?>
		<div class="sidebar-heading">
			<span><?= $mainMenu['title']; ?></span>
		</div>
		<?php
			$mainMenuSlug = $mainMenu['slug'];
			$queryMenuSub = "SELECT * FROM `menu_sub` WHERE `menu_main_slug` = '$mainMenuSlug' AND `is_active` = 1";
			$subMenus = $this->db->query($queryMenuSub)->result_array();
		?>
		<?php foreach ($subMenus as $subMenu) : ?>
			<li class="nav-item">
				<a class="nav-link" href="<?= $subMenu['url']; ?>">
					<i class="<?= $subMenu['icon']; ?>"></i>
					<span><?= $subMenu['title']; ?></span>
				</a>
			</li>
		<?php endforeach; ?>
		<hr class="sidebar-divider">
	<?php endforeach; ?>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/signout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span>
		</a>
	</li>
	<hr class="sidebar-divider">
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>