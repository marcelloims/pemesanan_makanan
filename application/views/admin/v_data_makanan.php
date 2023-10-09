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
                            <h1 class="m-0 text-dark">Data Makanan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"> Data Makanan</i>
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
                                <form action="<?= base_url() ?>admin/c_admin/tambah_makanan" id="form" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="kode_menu" value="MKN-<?php echo date('dmy') ?>-<?= $jumlah_makanan + 1 ?>">
                                        <div class="form-group">
                                            <label for="">Nama Makanan</label>
                                            <input type="text" class="form-control" name="nama_menu" value="<?php echo set_value('nama_menu'); ?>" placeholder="Nama Makanan">
											<span class="text-danger"><?php echo form_error('nama_menu') ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input type="text" class="form-control" name="harga" value="<?php echo set_value('harga');?>" placeholder="Harga">
											<?php echo form_error('harga'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi');?>" placeholder="Deskripsi">
											<?php echo form_error('deskripsi'); ?>
										</div>
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" class="file-control" name="foto" value="<?php echo set_value('foto');?>" placeholder="Foto">
											<?php echo form_error('foto'); ?>
										</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" id="tombal_tambah" class="btn btn-success">Save</button>
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
                                <th scope="col">Promo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="target">
                            <?php
                            $no = 1;
                            foreach ($makanan as $mkn) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td align="center"><?= $mkn->kode_menu ?></td>
                                    <td align="center"><?= $mkn->nama_menu ?></td>
                                    <td align="center">Rp. <?= number_format($mkn->harga, 0, ',', '.') ?></td>
                                    <td align="center">Rp. <?= number_format($mkn->promo, 0, ',', '.') ?></td>
                                    <td align="center"><?= $mkn->status ?></td>
                                    <td width="150px" align="center">
                                        <a href="<?= base_url('admin/c_admin/detail_makanan/' . $mkn->kode_menu) ?>" class=" btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= base_url('admin/c_admin/edit_makanan/' . $mkn->kode_menu) ?>" class=" btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/c_admin/delete_makanan/' . $mkn->kode_menu) ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
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

        // Sweet Alert 2 Simpan dan Update Data
        const simpanData = $('.flash-data').data('flashdata');
        // console.log(simpanMember);
        if (simpanData) {
            Swal.fire({
                title: 'Data Makanan',
                text: simpanData,
                icon: 'success'
            })
        }

        // Sweet Alert 2 Hapus Data
        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault();
            const hapus = $(this).attr('href')
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data Makanan akan di HAPUS!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data Makanan!',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = hapus
                }
            })
        })
    </script>
    <!-- jQuery -->
</body>

</html>
