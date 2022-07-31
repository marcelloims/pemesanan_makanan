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
                            <h1 class="m-0 text-dark"> Menu <small>Makanan</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                foreach ($makanan as $mkn) : ?>
                                    <div class="card mt-3 mr-3 ml-4" style="width: 14rem;">
                                        <div class="benner_logo" style="background-image: url('<?= base_url() . '/uploads/' . $mkn->foto; ?>')"></div>
                                        <div class="card-body text-center">
                                            <h6 class="card-title-center text-blue"><?= $mkn->nama_menu; ?></h6>
                                            <?php if ($mkn->promo) : ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <span>
                                                            <b><del>Rp. <?= number_format($mkn->harga, 0, ',', '.'); ?></del></b>
                                                        </span>
                                                    </div>
                                                    <div class="col text-success">
                                                        <span>
                                                            <b>Rp. <?= number_format($mkn->promo, 0, ',', '.'); ?></b>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <span>
                                                            <b>Rp. <?= number_format($mkn->harga, 0, ',', '.'); ?></b>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <form action="<?= base_url('pelayan/c_pelayan/pesan_menu_makanan/' . $mkn->kode_menu) ?>" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-5 text-center">
                                                    <input type="number" min="1" name="qty_item" class="form-control" placeholder="qty" required>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center bg-white">
                                                <a href="<?= base_url('pelayan/c_pelayan/detail_makanan/' . $mkn->kode_menu) ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-info-circle" aria-hidden="true"></i>Detail</a>
                                                <?php if ($mkn->status != 'Kosong') : ?>
                                                    <button type="submit" class="btn btn-sm btn-success">Pesan</button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm btn-danger" disabled>Kosong</button>
                                                <?php endif; ?>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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
    <script>
        const simpanData = $('.flash-data').data('flashdata');
        // console.log(simpanData);
        if (simpanData) {
            Swal.fire({
                title: 'Data Pesanan',
                text: simpanData,
                icon: 'success'
            })
        }
    </script>
</body>

</html>