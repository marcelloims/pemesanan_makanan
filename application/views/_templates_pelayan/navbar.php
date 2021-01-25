<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url() ?>assets/index3.html" class="navbar-brand">
            <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Waroeng Marcell</span>
        </a>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>pelayan/c_pelayan/data_makanan" class="nav-link">Foods</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>pelayan/c_pelayan/data_minuman" class="nav-link">Drinks</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>pelayan/c_pelayan/laporan" class="nav-link">Laporan</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <div class="navbar">
                    <li class="nav-item">
                        <?php $keranjang = '<i class="fa fa-cart-plus" aria-hidden="true"></i> Pesanan Anda : ' . $this->cart->total_items() . ' items' ?>
                        <?= anchor('pelayan/c_pelayan/detail_keranjang', $keranjang) ?>
                    </li>
                </div>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if ($this->session->userdata('username')) { ?>
                    <li>
                        <div>Selamat Datang : <?= $this->session->userdata('username') ?></div>
                    </li>
                    <li></li>
                <?php } else { ?>
                    <li><?= anchor('auth/c_auth/login', 'Login') ?></li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Setting</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-user" aria-hidden="true"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/c_auth/logout') ?>" class="dropdown-item">
                            <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>