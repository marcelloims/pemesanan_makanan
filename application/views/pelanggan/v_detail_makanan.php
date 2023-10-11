<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php $this->load->view('_templates_pelanggan/header') ?>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_pelanggan/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container text-center">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0 text-dark"> Detail <small>Makanan</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo base_url() . '/uploads/' . $makanan['foto'] ?>" class="card-img-top">
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td width="200px">Nama Produk</td>
                                    <td><strong><?php echo $makanan['nama_menu']; ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Status Makanan</td>
                                    <td><strong><?php echo $makanan['status']; ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Harga</td>
                                    <td><strong>Rp. <?php echo number_format($makanan['harga'], 0, ',', '.'); ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Deskripsi</td>
                                    <td><strong><?php echo $makanan['deskripsi']; ?></strong></td>
                                </tr>
                            </table>

                            <?php echo anchor('pelanggan/c_pelanggan/data_makanan/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php $this->load->view('_templates_pelanggan/footer') ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_pelanggan/js') ?>
</body>

</html>
