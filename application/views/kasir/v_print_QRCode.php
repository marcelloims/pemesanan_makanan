<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print QR Code</title>
</head>

<body>
	<div class="row">
		<div class="col-12">
			<?php $code = 'http://localhost:8080/pemesanan_makanan/pelanggan/c_pelanggan/data_makanan'; ?>
			<img src="<?= site_url('kasir/c_kasir/qrcode') ?>" alt="QR-Code" class="">
		</div>
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>
