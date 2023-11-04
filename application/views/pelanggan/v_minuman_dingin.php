<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<?php $this->load->view('_templates_pelanggan/header') ?>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_templates_pelanggan/navbar') ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container text-center">
					<div class="row mb-2">
						<div class="col-sm-12 text-center">
							<h1 class="m-0 text-dark"> Menu <small>Minuman</small></h1>
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
							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
							<div class="row">
								<?php
								foreach ($minuman as $mmn) : ?>
									<div class="card mt-3 mr-3 ml-4" style="width: 14rem;">
										<div class="benner_logo" style="background-image: url('<?= base_url() . '/uploads/' . $mmn->foto; ?>')"></div>
										<div class="card-body text-center">
											<h6 class="card-title-center text-blue"><?= $mmn->nama_menu; ?></h6>
											<?php if ($mmn->promo) : ?>
												<div class="row">
													<div class="col">
														<div class="btn btn-sm btn-secondary">
															<b><del>Rp. <?= number_format($mmn->harga, 0, ',', '.') . "<br>"; ?></del></b>
														</div>
													</div>
													<div class="col">
														<div class="btn btn-sm btn-success">
															<b>Rp. <?= number_format($mmn->promo, 0, ',', '.') . "<br>"; ?></b>
														</div>
													</div>
												</div>
											<?php else : ?>
												<p><b>Rp. <?= number_format($mmn->harga, 0, ',', '.') . "<br>"; ?></b></p>
											<?php endif; ?>
										</div>
										<form action="<?= base_url('pelanggan/c_pelanggan/pesan_menu_minuman/' . $mmn->kode_menu) ?>" method="post">
											<div class="row justify-content-center">
												<div class="col-5 text-center">
													<input type="number" min="1" name="qty_item" class="form-control" placeholder="qty" required>
													<?php if($mmn->toping == "Ya") :?>
														<?php foreach ($toping as $top) :?>
															<input type="radio" name="toping" id="<?= $top->id ?>" value="<?= $top->nama ?>"><?= $top->nama ?><br/>
														<?php endforeach; ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="card-footer text-center bg-white">
												<a href="<?= base_url('pelanggan/c_pelanggan/detail_minuman/' . $mmn->kode_menu) ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-info-circle" aria-hidden="true"></i>Detail</a>
												<?php if ($mmn->status != 'Kosong') : ?>
													<button type="submit" class="btn btn-sm btn-success">Pesan</button>
												<?php else : ?>
													<button class="btn btn-sm btn-danger" disabled>Kosong</button>
												<?php endif; ?>
											</div>
										</form>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<?php $this->load->view('_templates_pelanggan/footer') ?>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<?php $this->load->view('_templates_pelanggan/js') ?>
	<script>
		const simpanData = $('.flash-data').data('flashdata');
		// console.log(simpanData);
		if (simpanData) {
			Swal.fire({
				title: 'Data Pesanan',
				text: simpanData,
				icon: 'success'
			})
		}
	</script>
</body>

</html>
