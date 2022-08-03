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
                            <h1 class="m-0 text-dark">Detail Pesanan</h1>
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
                        <tbody id="data_pesanan">
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
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: "<?= base_url('admin/c_admin/datapesanan') ?>",
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        var html = '';
                        data.forEach(function(result, index) {
                            // console.log(result, index);
                            var d = new Date(result.tanggal_invoice)
                            var t = String(d)
                            var tanggal = t.substring(4, 25)
                            var i = index + 1
                            var button = result.status_pesanan == "Dalam Proses" ? "btn-info" : "btn-success"
                            html += '<tr>' +
                                '<th scope="row">' + i + '</th>' +
                                '<td align="center">' + result.no_invoice + '</td>' +
                                '<td align="center">' + tanggal + '</td>' +
                                '<td align="center">' + result.meja + '</td>' +
                                '<td align="center"><span class="btn btn-sm ' + button + '">' + result.status_pesanan + '</span></td>' +
                                '<td align="center">' +
                                '<a href="<?= base_url("admin/c_admin/detail_pesanan/") ?>' + result.no_invoice + '" class="btn btn-sm btn-info mr-2"><i class="fas fa-dollar-sign"></i></a>' +
                                '<a href="<?= base_url("admin/c_admin/print/") ?>' + result.no_invoice + '" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>' +
                                '</td>' +
                                '</tr>'
                        });
                        $('#data_pesanan').html(html);
                    }
                });
            }, 2000);
        });


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
                title: 'Data Pembayaran',
                text: simpanData,
                icon: 'success'
            })
        }
    </script>
    <!-- jQuery -->
</body>

</html>