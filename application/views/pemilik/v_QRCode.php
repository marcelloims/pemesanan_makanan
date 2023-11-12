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
							<?php $code = 'http://localhost:8080/pemesanan_makanan/pelanggan/c_pelanggan/data_makanan'; ?>
							<img src="<?= site_url('pemilik/c_pemilik/qrcode') ?>" alt="QR-Code" class="">
						</div>
						<div class="col-2 ml-5">
							<a href="<?= base_url('pemilik/c_pemilik/printQR') ?>" class="btn btn-primary">Print</a>
						</div>
					</div>
				</div>
			</section>
			<!-- Main content -->
		</div>

		<!-- Control Sidebar -->
		<?php $this->load->view('_templates_pemilik/control-sidebar') ?>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!--Footer start -->
		<?php $this->load->view('_templates_pemilik/footer'); ?>
	<!--Footer end -->

	<!-- jQuery -->
	<?php $this->load->view('_templates_pemilik/js'); ?>
	<script type="text/javascript">
		function onScanSuccess() {
			window.location = '<?= base_url('pelanggan/c_pelanggan/data_makanan') ?>';
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
