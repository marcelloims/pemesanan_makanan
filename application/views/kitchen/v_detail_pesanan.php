<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_templates_kitchen/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_kitchen/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_templates_kitchen/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Pesanan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
										
										<a href="<?= base_url('kitchen/c_kitchen/data_pesanan/')?>" class="btn btn-danger float-right mb-3">Kembali</a>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pesanan</th>
                                                    <th>Toping</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pesanan as $psn) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $psn->nama ?></td>
                                                        <td><?= $psn->toping ?></td>
                                                        <td><?= $psn->qty ?></td>
                                                        <td>Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                                                        <td>Rp. <?= number_format($psn->sub_total, 0, ',', '.') ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div>
            </section>
            <!-- Main content -->
        </div>

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_kitchen/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	<!--Footer start -->
	<?php $this->load->view('_templates_kitchen/footer'); ?>
	<!--Footer end -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_kitchen/js'); ?>
    <!-- jQuery -->
</body>

</html>
