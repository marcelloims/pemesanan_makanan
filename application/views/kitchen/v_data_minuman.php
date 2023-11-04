<!DOCTYPE html>
<html>

<head>
	<?php $this->load->view('_templates_kitchen/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_templates_kitchen/navbar'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_templates_kitchen/sidebar'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Data Minuman</h1>
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
						<i class="fas fa-plus"> Data Minuman</i>
					</button>
					<p class="login-box-msg"><?= $this->session->flashdata('pesan1') ?></p>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
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
								<form action="<?= base_url() ?>kitchen/c_kitchen/tambah_minuman" method="POST" enctype="multipart/form-data">
									<div class="modal-body">
										<input type="hidden" name="kode_menu" value="MMN-<?php echo date('dmy') ?>-<?= $jumlah_minuman + 1 ?>">
										<div class="form-group">
											<label for="">Nama Minuman</label>
											<input type="text" class="form-control" name="nama_menu" placeholder="Nama Minuman">
											<span class="text-danger"><?= $this->session->flashdata('nama_menu') ?></span>
										</div>
										<div class="form-group">
											<label for="">Kategori</label>
											<select name="kategori" id="kategori" class="form-control">
												<option disabled selected>Kategori Minuman</option>
												<option value="Ice">Ice</option>
												<option value="Hot">Hot</option>
											</select>
											<span class="text-danger"><?= $this->session->flashdata('kategori') ?></span>
										</div>
										<div class="form-group">
											<label for="">Harga</label>
											<input type="text" class="form-control" name="harga" placeholder="Harga">
											<span class="text-danger"><?= $this->session->flashdata('harga') ?></span>
										</div>
										<div class="form-group">
											<label for="">Deskripsi</label>
											<input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
											<span class="text-danger"><?= $this->session->flashdata('deskripsi') ?></span>
										</div>
										<div class="form-group">
											<label for="">Foto</label>
											<input type="file" class="file-control" name="foto" placeholder="Foto">
											<span class="text-danger"><?= $this->session->flashdata('foto') ?></span>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-success">Save changes</button>
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
						<tbody>
							<?php
							$no = 1;
							foreach ($minuman as $mmn) :
							?>
								<tr>
									<th scope="row"><?= $no++ ?></th>
									<td align="center"><?= $mmn->kode_menu ?></td>
									<td align="center"><?= $mmn->nama_menu ?></td>
									<td align="center">Rp. <?= number_format($mmn->harga, 0, ',', '.') ?></td>
									<td align="center">Rp. <?= number_format($mmn->promo, 0, ',', '.') ?></td>
									<td align="center"><?= $mmn->status ?></td>
									<td width="150px" align="center">
										<a href="<?= base_url('kitchen/c_kitchen/detail_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
										<a href="<?= base_url('kitchen/c_kitchen/edit_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
										<a href="<?= base_url('kitchen/c_kitchen/delete_minuman/' . $mmn->kode_menu) ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</section>
			<!-- Main content -->
		</div>

		<!-- Control Sidebar -->
		<?php $this->load->view('_templates_kitchen/control-sidebar') ?>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!--Footer start -->
		<?php $this->load->view('_templates_kitchen/footer'); ?>
	<!--Footer end -->


	<!-- jQuery -->
	<?php $this->load->view('_templates_kitchen/js'); ?>
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
				title: 'Data Minuman',
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
				text: "Data Minuman akan di HAPUS!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus Data Minuman!',
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
