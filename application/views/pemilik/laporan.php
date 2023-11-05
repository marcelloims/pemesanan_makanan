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
							<h1 class="m-0 text-dark">Laporan</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container">
					<form action="<?= base_url('pemilik/c_pemilik/hasil_laporan') ?>" method="POST">
						<div class="row">
							<div class="col-5">
								<div class="form-group">
									<label for="">Tanggal Awal</label>
									<input type="date" class="form-control" name="tanggal_awal">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="">Tanggal Akhir</label>
									<input type="date" class="form-control" name="tanggal_akhir">
								</div>
							</div>
							<div class="col-2">
								<div class="form-group"><br>
									<button type="submit" class="btn btn-sm btn-primary mt-1"><i class="fas fa-search"></i> Cari</button>
								</div>
							</div>
						</div>
					</form>
					<div class="row">
					<table id="example1" class="table table-hover">
						<thead>
							<tr align="center">
								<th scope="col">#</th>
								<th scope="col">No Invoice</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Total Invoice</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody id="target">
						</tbody>
					</table>
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
