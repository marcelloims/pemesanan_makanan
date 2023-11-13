<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_templates_pemilik/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_pemilik/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_templates_pemilik/sidebar'); ?>

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
                                        From
                                        <address>
                                            <strong>Jaju Coffee</strong><br>
                                            Jalan Cokroaminoto Nomor 128, Ubung<br>
											Kota Denpasar, Bali<br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice : <?= $detail['no_invoice'] ?></b><br>
                                        <br>
                                        <b>Status Pesanan:</b> <?= $detail['status_pesanan'] ?><br>
                                        <b>Tanggal Invoice:</b> <?= $detail['tanggal_invoice'] ?><br>
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
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <!-- <p class="lead">Payment Methods:</p>
                                        <img src="<?= base_url() ?>assets/dist/img/credit/visa.png" alt="Visa">
                                        <img src="<?= base_url() ?>assets/dist/img/credit/mastercard.png" alt="Mastercard">
                                        <img src="<?= base_url() ?>assets/dist/img/credit/american-express.png" alt="American Express">
                                        <img src="<?= base_url() ?>assets/dist/img/credit/paypal2.png" alt="Paypal">

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                            plugg
                                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                        </p> -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <?php
                                                $total = 0;
                                                $tax   = 0;
                                                $grand_total = 0;
                                                foreach ($pesanan as $ttl) :
                                                    $total += $ttl->sub_total;
                                                    $tax += $ttl->sub_total * 5 / 100;
                                                    $grand_total = $total + $tax;
                                                endforeach;
                                                ?>
                                                <tr>
                                                    <th style="width:50%">Total:</th>
                                                    <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tax and Service (5%)</th>
                                                    <td>Rp. <?= number_format($tax, 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Grand Total:</th>
                                                    <td>Rp. <?= number_format($grand_total, 0, ',', '.') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">

                                        <!-- <?php if ($detail['status_pesanan'] == "Dalam Proses") : ?>
                                            <a href="<?= base_url('pemilik/c_pemilik/submit_payment/' . $detail['no_invoice']) ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                                Payment</a>
                                        <?php endif; ?> -->
                                    </div>
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
        <?php $this->load->view('_templates_pemilik/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	<!--Footer start -->
	<?php $this->load->view('_templates_pemilik/footer'); ?>
	<!--Footer end -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_pemilik/js'); ?>
    <!-- jQuery -->
</body>

</html>
