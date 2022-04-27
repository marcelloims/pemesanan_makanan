<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php $this->load->view('templates_customer/header') ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('templates_customer/navbar') ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="container-fluid">
                        <div class="col-lg-12 col-md-12">
                            <br><br>
                            <h2>Daftar Pesanan Anda</h2>
                            <div class="small-box bg-white">
                                <div class="inner">
                                    <table class="table">
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Tanggal Belanja</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        foreach ($pesanan as $psn) : ?>
                                            <tr align="center">
                                                <td><?= $no++ ?></td>
                                                <td>INV-<?= $psn->no_transaksi ?></td>
                                                <td><?= $psn->tanggal_transaksi ?></td>
                                                <td><?= $psn->metode_pembayaran ?></td>
                                                <td><a href="<?= base_url('customer/c_customer/detail_pesanan/' . $psn->no_transaksi) ?>" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <br>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php $this->load->view('templates_customer/footer') ?>
        <!-- Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('templates_customer/js') ?>
    <script>

    </script>
</body>

</html>