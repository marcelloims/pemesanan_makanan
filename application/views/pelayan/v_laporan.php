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
                            <h1 class="m-0 text-dark"> Laporan <small> Pelayan</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">


                        <div class="container-fluid">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal Invoice</th>
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">No Meja</th>
                                        <th scope="col">Pelayan</th>
                                        <th scope="col">Status Pesanan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($laporan as $psn) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td align="center"><?= $psn->tanggal_invoice ?></td>
                                            <td align="center"><?= $psn->no_invoice ?></td>
                                            <td align="center"><?= $psn->meja ?></td>
                                            <td align="center"><?= $psn->nama_pelayan ?></td>
                                            <td align="center"><?= $psn->status_pesanan ?></td>
                                            <td width="150px" align="center">
                                                <a href="<?= base_url('pelayan/c_pelayan/print_laporan/' . $psn->no_invoice) ?>" class=" btn btn-sm btn-info"><i class="fas fa-info"></i></a>
                                                <a href="<?= base_url('pelayan/c_pelayan/print/' . $psn->no_invoice) ?>" class=" btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>


</body>

</html>