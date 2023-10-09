<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url() ?>admin/c_admin/dashboard" class="brand-link">
		<!-- <img src="<?= base_url() ?>assets/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
		<span class="brand-text font-weight-light">Jaju Coffee</span>
	</a>


	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview menu-open">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Menu
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/c_admin/dashboard" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/c_admin/data_makanan" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Makanan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/c_admin/data_minuman" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Minuman</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/c_admin/data_pesanan" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Pesanan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/c_admin/viewQR" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Print QR Menu</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
