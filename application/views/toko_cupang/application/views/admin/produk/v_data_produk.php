<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('templates_admin/header') ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('templates_admin/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('templates_admin/sidebar') ?>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Produk</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"> Data Produk</i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/c_admin/tambah_produk') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Nama Produk</label>
                                                    <input type="text" name="nama_produk" class="form-control" id="namaProduk" placeholder="Nama Produk">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Harga</label>
                                                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Satuan</label>
                                                    <select name="satuan" id="satuan" class="form-control">
                                                        <option selected disabled>-- Silahkan Pilih --</option>
                                                        <?php foreach ($satuan as $sat) : ?>
                                                            <option value="<?= $sat->id_unit ?>"><?= $sat->nama_unit ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Jenis</label>
                                                    <select name="jenis" id="jenis" class="form-control">
                                                        <option disabled selected>-- Silahkan Pilih --</option>
                                                        <?php foreach ($jenis as $jen) : ?>
                                                            <option value="<?= $jen->id_jenis ?>"><?= $jen->nama_jenis ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Berat (Gram)</label>
                                                    <input type="number" min="1" name="berat" class="form-control" placeholder="Satuan Berat">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Video</label>
                                                    <input type="file" name="video" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Gambar</label>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img id="gambar" src="" alt="..." class="img-thumbnail">
                                                </div>
                                                <!-- <div class="col-12">
                                                    <video width="257px" height="250px" controls>
                                                        <source id="video_mp4" src="" type="">
                                                        <source id="video_ogg" src="" type="">
                                                        <source id="video_webm" src="" type="">
                                                    </video>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Kode Produk</label>
                                                        <input type="text" id="detailKode" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Nama Produk</label>
                                                        <input type="text" id="detailNama" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Harga</label>
                                                        <input type="text" id="detailHarga" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Qty</label>
                                                        <input type="text" id="detailQty" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Satuan</label>
                                                        <input type="text" id="detailSatuan" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Jenis</label>
                                                        <input type="text" id="detailJenis" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Berat(gram)</label>
                                                        <input type="text" id="detailBerat" value="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">#</th>
                                        <th scope="col">ID Produk</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $pro) : ?>
                                        <tr>
                                            <td scope="row" align="center"><b><?= $no++ ?></b></td>
                                            <td align="center"><?= $pro->id_produk ?></td>
                                            <td><?= $pro->nama_produk ?></td>
                                            <td>Rp. <?= number_format($pro->harga, 0, ',', '.') ?></td>
                                            <td align="center"><?= number_format($pro->qty, 0, ',', '.') ?></td>
                                            <td align="center" width="105px">
                                                <a href="#exampleModal1" class="btn btn-sm btn-info" data-toggle="modal" onclick="detail('<?= $pro->id_produk ?>')"><i class="fas fa-info-circle"></i></a>
                                                <a href="<?= base_url('admin/c_admin/edit_produk/' . $pro->id_produk) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/c_admin/hapus_produk/' . $pro->id_produk) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </section>
            <!-- Main content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
        <?php $this->load->view('templates_admin/footer') ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('templates_admin/js') ?>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        // Sweet Alert 2 Simpan dan Update Data Member
        const simpanProduk = $('.flash-data').data('flashdata');
        // console.log(simpanProduk);
        if (simpanProduk) {
            Swal.fire({
                title: 'Data Produk',
                text: simpanProduk,
                icon: 'success'
            })
        }

        // Sweet Alert 2 Hapus Data Member
        $('.tombol-hapus').on('click', function(e) {

            e.preventDefault();
            const hapus = $(this).attr('href')

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data Member akan di HAPUS!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data Produk',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = hapus
                }
            })

        })


        function detail(x) {
            // console.log(x)
            $.ajax({
                type: 'POST',
                data: 'id =' + x,
                url: '<?= base_url("admin/c_admin/detail_produk/") ?>' + x,
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);
                    document.getElementById('gambar').src = "<?= base_url('uploads/') ?>" + result.detail.gambar
                    // document.getElementById('video_mp4').src = "<?= base_url('uploads/') ?>" + result.detail.video
                    // document.getElementById('video_ogg').src = "<?= base_url('uploads/') ?>" + result.detail.video
                    // document.getElementById('video_webm').src = "<?= base_url('uploads/') ?>" + result.detail.video
                    // document.getElementById('video_mp4').type = "video/mp4"
                    // document.getElementById('video_ogg').type = "video/ogg"
                    // document.getElementById('video_webm').type = "video/webm"
                    document.getElementById('detailKode').value = result.detail.id_produk
                    document.getElementById('detailNama').value = result.detail.nama_produk
                    document.getElementById('detailHarga').value = result.detail.harga
                    document.getElementById('detailSatuan').value = result.detail.nama_unit
                    document.getElementById('detailJenis').value = result.detail.nama_jenis
                    document.getElementById('detailQty').value = result.detail.qty
                    document.getElementById('detailBerat').value = result.detail.berat
                }
            })
        }
    </script>
    <!-- jQuery -->
</body>

</html>