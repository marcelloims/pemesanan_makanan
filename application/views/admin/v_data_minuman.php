<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_templates_admin/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_templates_admin/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_templates_admin/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Minuman</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Button trigger modal -->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"> Data Minuman</i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Makanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url() ?>admin/c_admin/tambah_minuman" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="text" name="kode_menu" value="MMN-<?php echo date('dmy') ?>-<?= $jumlah_minuman + 1 ?>">
                                        <div class="form-group">
                                            <label for="">Nama Minuman</label>
                                            <input type="text" class="form-control" name="nama_menu" placeholder="Nama Minuman">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input type="text" class="form-control" name="harga" placeholder="Harga">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" class="file-control" name="foto" placeholder="Foto">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">#</th>
                                <th scope="col">Kode Makanan</th>
                                <th scope="col">Nama Makanan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($minuman as $mmn) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td align="center"><?= $mmn->kode_menu ?></td>
                                    <td align="center"><?= $mmn->nama_menu ?></td>
                                    <td align="center">Rp. <?= number_format($mmn->harga, 0, ',', '.') ?></td>
                                    <td align="center"><?= $mmn->status ?></td>
                                    <td width="150px" align="center">
                                        <a href="<?= base_url('admin/c_admin/detail_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= base_url('admin/c_admin/edit_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/c_admin/delete_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin HAPUS Data ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Main content -->
        </div>


        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_admin/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_admin/js'); ?>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- jQuery -->
</body>

</html>