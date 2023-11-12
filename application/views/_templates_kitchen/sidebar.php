<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url() ?>kitchen/c_kitchen/dashboard" class="brand-link">
		<!-- <img src="<?= base_url() ?>assets/dist/img/logo.jpg" alt="kitchenLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
		<span class="brand-text font-weight-light">Jaju Coffee</span>
	</a>


	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" class="sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url() ?>kitchen/c_kitchen/dashboard" <?= $this->uri->segment(3) ==  'dashboard' ? 'class="nav-link active"' : '' ?> class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-header">MENU</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>kitchen/c_kitchen/data_makanan" <?= $this->uri->segment(3) ==  'data_makanan' ? 'class="nav-link active"' : '' ?> class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Data Makanan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>kitchen/c_kitchen/data_minuman" <?= $this->uri->segment(3) ==  'data_minuman' ? 'class="nav-link active"' : '' ?> class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Data Minuman</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>kitchen/c_kitchen/data_toping" <?= $this->uri->segment(3) ==  'data_toping' ? 'class="nav-link active"' : '' ?> class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Data Toping</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>kitchen/c_kitchen/data_pesanan" <?= $this->uri->segment(3) ==  'data_pesanan' ? 'class="nav-link active"' : '' ?> class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Data Pesanan</p>
					</a>
				</li>
				<li class="nav-item">
					<!-- <a href="<?= base_url() ?>kitchen/c_kitchen/viewQR" <?= $this->uri->segment(3) ==  'viewQR' ? 'class="nav-link active"': '' ?> class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Print QR Menu</p>
					</a> -->
					<!-- </a> -->
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/dashboard" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/data_makanan" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Makanan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/data_minuman" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Minuman</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/data_toping" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Toping</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/data_pesanan" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Pesanan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>kitchen/c_kitchen/viewQR" class="nav-link">
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
