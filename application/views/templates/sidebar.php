<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-code"></i>
		</div>
		<div class="sidebar-brand-text mx-3"><?= $title; ?></div>
	</a>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		<span>Admin</span>
	</div>
	<li class="nav-item">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		<span>Member</span>
	</div>
	<li class="nav-item">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-user"></i>
			<span>Profile</span>
		</a>
	</li>
	<hr class="sidebar-divider">
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