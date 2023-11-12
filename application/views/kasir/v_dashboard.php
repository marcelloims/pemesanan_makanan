<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_templates_kasir/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_kasir/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_templates_kasir/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $total_makanan ?></h3>

                                    <p>Jumlah Menu Makanan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hamburger"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $total_minuman ?></h3>

                                    <p>Jumlah Menu Minuman</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-glass-cheers"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $total_karyawan ?></h3>

                                    <p>Jumlah Karyawan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $total_pesanan ?></h3>

                                    <p>Jumlah Pesanan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <hr>
                    <h3>Data Penjualan Makanan</h3>
                    <div class="row">
                        <?php
                        foreach ($penjualan_mkn as $mkn) : ?>
                            <?php if ($mkn[0]->qty) : ?>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3><?= $mkn[0]->qty ?></h3> <span>Porsi</span>
                                            <p><?= $mkn[0]->nama ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <h3>Data Penjualan Minuman</h3>
                    <div class="row">
                        <?php
                        foreach ($penjualan_mmn as $mkn) : ?>
                            <?php if ($mkn[0]->qty) : ?>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-light">
                                        <div class="inner">
                                            <h3><?= $mkn[0]->qty ?></h3> <span>Porsi</span>
                                            <p><?= $mkn[0]->nama ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.row -->


                </div>
            </section>
            <!-- Main content -->
        </div>




        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline-block">
                <b>Jaju Coffee</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_kasir/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_kasir/js'); ?>
    <script>
    </script>
    <!-- jQuery -->
</body>

</html>
