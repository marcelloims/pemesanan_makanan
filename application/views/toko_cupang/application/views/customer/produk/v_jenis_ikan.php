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
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-6 bg-white mt-4 mb-3">
                    <div class="container">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= base_url('assets/dist/img/produk/background1.jpg') ?>" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/dist/img/produk/background2.jpg') ?>" class="d-block w-100 img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/dist/img/produk/background3.jpg') ?>" class="d-block w-100 img-fluid" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 bg-white  mt-4 mb-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <img src="<?= base_url('assets/dist/img/produk/background4.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <img src="<?= base_url('assets/dist/img/produk/background5.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <img src="<?= base_url('assets/dist/img/produk/background6.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <img src="<?= base_url('assets/dist/img/produk/background7.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h4><strong>Jenis Ikan Cupang</strong></h4>
                        <hr>
                        <div class="row justify-content-center">
                            <?php foreach ($jenis as $jen) : ?>
                                <div class="col-lg-1 col-2 col-sm-1 col-md-1 mr-2 text-center">
                                    <a href="<?= base_url('customer/c_customer/jenis_ikan/' . $jen->nama_jenis) ?>">
                                        <img src="<?= base_url('assets/dist/img/produk/jenis.jpg') ?>" alt="..." class="img-thumbnail">
                                        <span class="badge text-wrap" style="color: black;"><?= $jen->nama_jenis ?></span>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row justify-content-left">
                        <br>
                        <?php if ($produk != NULL) : ?>
                            <?php foreach ($produk as $pro) : ?>
                                <a href="<?= base_url("customer/c_customer/detail_produk/" . $pro->id_produk) ?>">
                                    <div class="card mt-5 mr-5 ml-2" style="width: 14rem; height: 20rem;">
                                        <div class="card-body text-center">
                                            <img src="<?= base_url("uploads/" . $pro->gambar) ?>" class="img-thumbnail" alt="...">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="text-gray-dark text-wrap badge"><?= $pro->nama_produk ?></span>
                                                </div>
                                                <div class="col-12 mt-1">
                                                    <?php if ($pro->qty == 0) : ?>
                                                        <span class="text-light btn-sm btn-warning"><i class="fa fa-info-circle" aria-hidden="true"> Sold Out</i></span>
                                                    <?php else : ?>
                                                        <span class="text-light btn-sm btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"> Available</i></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-12">
                                                    <span class="font-weight-bold">Rp. <?= number_format($pro->harga, 0, ",", ".") ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Opps!</h4>
                                <p>Mohon maaf untuk ikan cupang jenis <strong><?= $this->uri->segment(4) ?></strong> sedang dalam proses <strong>Restocking</strong>. Estimasi waktu produksi tersedia adalah 1 minggu. Silahkan melihat-lihat produk ikan cupang yang lain.</p>
                                <hr>
                                <p class="mb-0">Terimasih sudah mengunjungi toko kami.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="float-right">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
                <br><br><br>
            </div>
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