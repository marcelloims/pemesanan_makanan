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
							<h1 class="m-0 text-dark"> Detail <small>Pesanan</small></h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<form action="<?php echo base_url('pelayan/c_pelayan/proses_pesan') ?>" method="POST">
						<div class="row">
							<table class="table table-bordered table-striped table-hover">
								<tr align="center">
									<th>No Meja</th>
									<td><input type="number" min="1" name="meja" class="form-control" required></td>
								</tr>
								<tr align="center">
									<th>No</th>
									<th>Nama Produk</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th colspan="2">Sub Total</th>
								</tr>

								<?php
								$no = 1;
								foreach ($this->cart->contents() as $items) :
								?>

									<tr>
										<td align="center"><?php echo $no++ ?></td>
										<td><?php echo $items['name'] ?></td>
										<td>
											<input type="number" class="form-control text-center" id="qty" min="1" name="qty" value="<?= number_format($items['qty']) ?>" onchange="update_cart(this.value, '<?= $items['rowid'] ?>')">
										</td>
										<td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
										<td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
										<td align="center"><a href="<?= base_url('pelayan/c_pelayan/hapus_items/' . $items['rowid']) ?>"><i class="fa fa-close btn btn-danger"></i></a></td>
									</tr>
								<?php endforeach; ?>

								<tr>
									<td align="center" colspan="6"><strong>Grand Total : Rp. <?php echo number_format($this->cart->total(), 0, ',', '.')  ?></strong></td>
								</tr>
							</table>
						</div>
						<div class="text-right">
							<?php if ($this->cart->contents() != NULL) : ?>
								<a href="<?php echo base_url('pelayan/c_pelayan/hapus_keranjang') ?>">
									<div class="btn btn-sm btn-danger hapus-keranjang">Hapus Pesanan</div>
								</a>
							<?php endif; ?>
							<a href="<?php echo base_url('pelayan/c_pelayan/data_makanan') ?>">
								<div class="btn btn-sm btn-primary">Tambah Pesanan</div>
							</a>
							<?php if ($this->cart->contents() != NULL) : ?>
								<button type="submit" class="btn btn-sm btn-success">Pesan</button>
							<?php endif; ?>
						</div>
					</form>
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
		function update_cart(qty, kodeProduk) {
			$.ajax({
				url: "<?= base_url('pelayan/c_pelayan/update_keranjang') ?>",
				type: "POST",
				dataType: "JSON",
				data: {
					qty: qty,
					kode: kodeProduk
				},
				success: function(result) {
					// console.log(result)
					location.reload()
				}
			})
		}

		$('.hapus-keranjang').on('click', function(e) {
			e.preventDefault();
			const hapus = $(this).attr('href')

			console.log(hapus);

			// Swal.fire({
			// 	title: 'Apakah anda yakin?',
			// 	text: "Keranjang anda akan di HAPUS!",
			// 	icon: 'warning',
			// 	showCancelButton: true,
			// 	confirmButtonColor: '#3085d6',
			// 	cancelButtonColor: '#d33',
			// 	confirmButtonText: 'Ya, Hapus Keranjang!',
			// 	cancelButtonText: 'Tidak, batalkan'
			// }).then((result) => {
			// 	if (result.isConfirmed) {
			// 		document.location.href = hapus
			// 	}
			// })
		})
	</script>
</body>

</html>
