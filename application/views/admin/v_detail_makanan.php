<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_templates_admin/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_admin/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_templates_admin/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Makanan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo base_url() . '/uploads/' . $makanan['foto'] ?>" class="card-img-top">
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td width="200px">Nama Makanan</td>
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

                            <?php echo anchor('admin/c_admin/data_makanan/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
        </div>


        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_admin/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_admin/js'); ?>
    <!-- jQuery -->
</body>

</html>