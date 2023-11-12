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
                            <h1 class="m-0 text-dark">Edit Toping</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="<?= base_url('pemilik/c_pemilik/update_toping/') ?>" method="POST" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label for="">Nama Makanan</label>
									<input type="hidden" name="id"  value="<?= $toping->id ?>">
                                    <input type="text" class="form-control" name="nama" value="<?= $toping->nama ?>">
                                </div>
								<div class="form-group">
                                    <label for="">Status Toping</label>
                                    <select name="status" class="form-control">
                                        <?php foreach ($status as $sta) : ?>
                                            <?php if ($sta == $toping->status) : ?>
                                                <option value="<?= $sta ?>" selected><?= $sta ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sta ?>"><?= $sta ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-success float-right ml-3 mb-3">Simpan</button>
                                <?php echo anchor('pemilik/c_pemilik/data_toping/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
        </div>


       <!--Footer -->
	  	<?php $this->load->view('_templates_pemilik/footer'); ?>
	<!-- Footer -->

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_pemilik/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_pemilik/js'); ?>
    <!-- jQuery -->
</body>

</html>
