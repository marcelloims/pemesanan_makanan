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
                            <h1 class="m-0 text-dark"> Detail <small>Pesanan</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <form action="<?php echo base_url('pelayan/c_pelayan/proses_pesan') ?>" method="POST">
                        <div class="row">
                            <table class="table table-bordered table-striped table-hover">
                                <tr align="center">
                                    <th>No Meja</th>
                                    <td><input type="text" name="meja" class="form-control" required></td>
                                </tr>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($this->cart->contents() as $items) :
                                ?>

                                    <tr>
                                        <td align="center"><?php echo $no++ ?></td>
                                        <td><?php echo $items['name'] ?></td>
                                        <td align="center"><?php echo $items['qty'] ?></td>
                                        <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                                        <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td align="center" colspan="4">Grand Total</td>
                                    <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.')  ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo base_url('pelayan/c_pelayan/hapus_keranjang') ?>">
                                <div class="btn btn-sm btn-danger">Hapus Pesanan</div>
                            </a>
                            <a href="<?php echo base_url('pelayan/c_pelayan/data_makanan') ?>">
                                <div class="btn btn-sm btn-primary">Tambah Pesanan</div>
                            </a>
                            <?php if ($this->cart->contents() != NULL) : ?>
                                <button type="submit" class="btn btn-sm btn-success">Pesan</button>
                            <?php endif; ?>
                        </div>
                    </form>
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