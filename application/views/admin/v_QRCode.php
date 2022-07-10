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
							<h1 class="m-0 text-dark">QR Menu</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container">
					<div class="row">
						<div class="col-3">
							<?php $code = 'http://localhost:8080/pemesanan_makanan/pelayan/c_pelayan/data_makanan'; ?>
							<img src="<?= site_url('admin/c_admin/qrcode') ?>" alt="QR-Code" class="">
						</div>
						<div class="col-2 ml-5">
							<a href="<?= base_url('admin/c_admin/printQR') ?>" class="btn btn-primary">Print</a>
						</div>
					</div>
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
	<script type="text/javascript">
		function onScanSuccess() {
			window.location = '<?= base_url('pelayan/c_pelayan/data_makanan') ?>';
		}
		var html5QrcodeScanner = new Html5QrcodeScanner(
			"qr-reader", {
				fps: 10,
				qrbox: 250
			});
		html5QrcodeScanner.render(onScanSuccess);
	</script>
	<!-- jQuery -->
</body>

</html>
