<aside class="main-sidebar sidebar-light-white bg-light elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>BETTA </b>MOKE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('nama_user') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview">
                    <a href="<?= base_url('admin/c_admin/dashboard') ?>" class="nav-link <?= $sidebar == 'dashboard' ? 'active' : '' ?>">
                        <i class=" nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?= $sidebar == 'data_member' ? 'menu-open' : '' ?> <?= $sidebar == 'data_produk' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="fa fa-database" aria-hidden="true"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin/data_member') ?>" class="nav-link <?= $sidebar == 'data_member' ? 'active' : '' ?> <?= $sidebar == 'detail_member' ? 'active' : '' ?> <?= $sidebar == 'edit_member' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin/data_produk') ?>" class="nav-link <?= $sidebar == 'data_produk' ? 'active' : '' ?> <?= $sidebar == 'edit_produk' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= $sidebar == 'data_unit' ? 'menu-open' : '' ?> <?= $sidebar == 'data_type' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                        <p>
                            Deskripsi Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin/data_unit') ?>" class="nav-link <?= $sidebar == 'data_unit' ? 'active' : '' ?> <?= $sidebar == 'edit_unit' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Satuan Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin/data_type') ?>" class="nav-link <?= $sidebar == 'data_type' ? 'active' : '' ?> <?= $sidebar == 'edit_type' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Produk</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin/data_kategori') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item has-treeview <?= $sidebar == 'data_pesanan' ? 'menu-open' : '' ?> <?= $sidebar == 'detail_pesanan' ? 'menu-open' : '' ?> <?= $sidebar == 'edit_pesanan' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <p>
                            Master Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/c_admin/data_pesanan" class="nav-link <?= $sidebar == 'data_pesanan' ? 'active' : '' ?> <?= $sidebar == 'detail_pesanan' ? 'active' : '' ?> <?= $sidebar == 'edit_pesanan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pesanan</p>
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