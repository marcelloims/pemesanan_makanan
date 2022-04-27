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

                    <form action="<?= base_url('customer/c_customer/add_to_cart/' . $detail['id_produk']) ?>" method="POST">
                        <br>
                        <div class="card card-solid">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="col-12">
                                            <img src="<?= base_url('uploads/' . $detail['gambar']) ?>" class="product-image" alt="Product Image">
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            <video width="140px" height="140px" controls>
                                                <source src="<?php echo base_url() . '/uploads/' . $detail['video']; ?>" type="video/mp4">
                                                <source src="<?php echo base_url() . '/uploads/' . $detail['video']; ?>" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <h3 class="my-3"><?= $detail['nama_produk'] ?></h3>
                                        <hr>
                                        <table class="table">
                                            <tr align="center">
                                                <th>Unit</th>
                                                <th>Type</th>
                                            </tr>
                                            <tr align="center">
                                                <td><?= $detail['nama_unit'] ?> </td>
                                                <td><?= $detail['nama_jenis'] ?></td>
                                            </tr>
                                        </table>
                                        </p>
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="number" hidden name="berat" class="form-control" value="<?= $detail['berat'] ?>">
                                            </div>
                                        </div>
                                        <div class="bg-gray py-2 px-3 mt-4">
                                            <h2 class="mb-0">
                                                Rp. <?= number_format($detail['harga'], 0, ',', '.') ?>
                                            </h2>
                                            <h4 class="mt-0">
                                                <small>Ex Tax : Include</small>
                                            </h4>
                                        </div>
                                        <div class="mt-4">
                                            <?php if ($detail['qty'] == 0) : ?>
                                                <button type="submit" disabled class="btn btn-primary btn-lg btn-flat">
                                                    <i class="fas fa-cart-plus fa-lg mr-2"></i> Add to Cart
                                                </button>
                                                <div class="alert alert-warning alert-dismissible fade show mt-3 text-center" role="alert">
                                                    <strong>Opps!!</strong> Maaf ikan ini sudah terjual silah pilih ikan yang lain. <strong>Terimakasih</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php else : ?>
                                                <button type="submit" class="btn btn-primary btn-lg btn-flat">
                                                    <i class="fas fa-cart-plus fa-lg mr-2"></i> Add to Cart
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Main content -->
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