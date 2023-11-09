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
					<form action="<?= base_url('pemilik/c_pemilik/hasil_laporan') ?>" method="get">
						<div class="row">
							<div class="col-5">
								<div class="form-group">
									<label for="">Tanggal Awal</label>
									<input type="date" class="form-control" name="tanggal_awal" value="<?= $date[0] ?>">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="">Tanggal Akhir</label>
									<input type="date" class="form-control" name="tanggal_akhir" value="<?= $date[1] ?>">
								</div>
							</div>
							<div class="col-2">
								<div class="form-group"><br>
									<button type="submit" class="btn btn-sm btn-primary mt-1"><i class="fas fa-search"></i> Cari</button>
								</div>
							</div>
						</div>
					</form>
					<?php if ($data) : ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
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
										<tbody>
											<?php
											$no = 1;
											$totalInvoice = 0;
											foreach ($data  as $item) : ?>
												<tr align="center">
													<td><?= $no++ ?></td>
													<td><?= $item->no_invoice ?></td>
													<td><?= $item->tanggal_invoice ?></td>
													<td>Rp. <?= number_format($item->total, '0', ',', '.') ?></td>
													<td><?= $item->status_pesanan ?></td>
												</tr>
											<?php
												$totalInvoice += $item->total;
											endforeach; ?>
										</tbody>
										<tfoot>
											<tr class="text-bold">
												<td align="center" colspan="4">Grand Total</td>
												<td align="left">Rp. <?= number_format($totalInvoice, 0, ',', '.') ?></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
				</div>
			<?php endif; ?>
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