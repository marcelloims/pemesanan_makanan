<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php $this->load->view('_templates_pelayan/header') ?>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_pelayan/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container text-center">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0 text-dark"> Detail <small>Drink</small></h1>
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
                            <img src="<?php echo base_url() . '/uploads/' . $minuman['foto'] ?>" class="card-img-top">
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td width="200px">Nama Produk</td>
                                    <td><strong><?php echo $minuman['nama_menu']; ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Status minuman</td>
                                    <td><strong><?php echo $minuman['status']; ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Harga</td>
                                    <td><strong>Rp. <?php echo number_format($minuman['harga'], 0, ',', '.'); ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="200px">Deskripsi</td>
                                    <td><strong><?php echo $minuman['deskripsi']; ?></strong></td>
                                </tr>
                            </table>

                            <?php echo anchor('pelayan/c_pelayan/data_minuman/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php $this->load->view('_templates_pelayan/footer') ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_pelayan/js') ?>
</body>

</html>