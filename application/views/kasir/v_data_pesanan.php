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
                            <h1 class="m-0 text-dark">Data Pesanan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Invoice</th>
                                <th scope="col">No Invoice</th>
                                <th scope="col">No Meja</th>
                                <th scope="col">Status Pesanan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Main content -->
        </div>
		
        <!-- Control Sidebar -->
        <?php $this->load->view('_templates_kasir/control-sidebar') ?>
        <!-- /.control-sidebar -->
    </div>

	<!--Footer start -->
	<?php $this->load->view('_templates_kasir/footer'); ?>
	<!--Footer end -->

    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_templates_kasir/js'); ?>
    <script>
        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url("kasir/c_kasir/get_pesanan") ?>',
                type: 'POST'
            },
            "columnDefs": [{
                    targets: [0],
                    'className': 'text-bold'
                },
                {
                    targets: [1, 2, 3, 4, 5],
                    'className': 'text-center'
                },
                {
                    targets: [0, 3, 4, 5],
                    orderable: false
                }
            ],
        });


        // Sweet Alert 2 Simpan dan Update Data
        const simpanData = $('.flash-data').data('flashdata');
        // console.log(simpanMember);
        if (simpanData) {
            Swal.fire({
                title: 'Data Pembayaran',
                text: simpanData,
                icon: 'success'
            })
        }
    </script>
    <!-- jQuery -->
</body>

</html>
