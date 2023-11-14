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
                            <h1 class="m-0 text-dark">Edit Minuman</h1>
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
                            <img src="<?php echo base_url() . '/uploads/' . $minuman->foto ?>" class="card-img-top">
                        </div>
                        <div class="col-md-7">
                            <form action="<?= base_url() ?>kasir/c_kasir/update_minuman" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Kode Minuman</label>
                                    <input type="text" class="form-control" name="kode_menu" value="<?= $minuman->kode_menu ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Minuman</label>
                                    <input type="text" class="form-control" name="nama_menu" value="<?= $minuman->nama_menu ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <?php foreach ($kategori as $kat) : ?>
                                            <?php if ($kat == $minuman->kategori) : ?>
                                                <option value="<?= $kat ?>" selected><?= $kat ?></option>
                                            <?php else : ?>
                                                <option value="<?= $kat ?>"><?= $kat ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control" name="harga" value="<?= $minuman->harga ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Promo</label>
                                    <input type="text" class="form-control" name="promo" value="<?= $minuman->promo ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" value="<?= $minuman->deskripsi ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="file-control" name="foto" value="">
                                </div>
								<div class="form-group">
                                    <label for="">Toping</label>
                                    <select name="toping" class="form-control">
                                        <?php foreach ($toping as $top) : ?>
                                            <?php if ($top == $minuman->toping) : ?>
                                                <option value="<?= $top ?>" selected><?= $top ?></option>
                                            <?php else : ?>
                                                <option value="<?= $top ?>"><?= $top ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status minuman</label>
                                    <select name="status" class="form-control">
                                        <?php foreach ($status as $sta) : ?>
                                            <?php if ($sta == $minuman->status) : ?>
                                                <option value="<?= $sta ?>" selected><?= $sta ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sta ?>"><?= $sta ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-success float-right ml-3 mb-3">Simpan</button>
                                <?php echo anchor('kasir/c_kasir/data_minuman/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
        </div>

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_kasir/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

	<!--Footer start -->
	<?php $this->load->view('_templates_kasir/footer'); ?>
	<!--Footer end -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_kasir/js'); ?>
    <!-- jQuery -->
</body>

</html>
