<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
	<div class="container">
		<a href="<?= base_url('auth/c_auth/login') ?>" class="navbar-brand">
			<img src="<?= base_url() ?>assets/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">Angkringan Veskop</span>
		</a>

		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url() ?>pelayan/c_pelayan/data_makanan" class="nav-link">Makanan</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>pelayan/c_pelayan/data_minuman" class="nav-link">Minuman</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<ul class="navbar-nav">
					<div class="navbar">
						<li class="nav-item">
							<?php $keranjang = '<i class="fa fa-cart-plus" aria-hidden="true"></i> Pesanan Anda : ' . $this->cart->total_items() . ' items' ?>
							<?= anchor('pelayan/c_pelayan/detail_keranjang', $keranjang) ?>
						</li>
					</div>
				</ul>
			</ul>
		</div>
	</div>
</nav>
