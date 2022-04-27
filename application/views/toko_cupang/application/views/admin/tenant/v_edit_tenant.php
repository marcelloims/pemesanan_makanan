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
                            <h1>Form Ubah Tenant</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container">
                    <div class="info-box">
                        <form action="<?= base_url('admin/c_admin/update_tenant') ?>" method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Kode Tenant</label>
                                        <input type="text" name="kode_tenant" class="form-control" id="kodeTenant" placeholder="Kode Tenant" value="<?= $edit['kode_tenant'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="">Nama Tenant</label>
                                        <input type="text" name="nama_tenant" class="form-control" id="kodeTenant" placeholder="Nama Tenant" value="<?= $edit['nama_tenant'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Telepon</label>
                                        <input type="text" name="telepon_tenant" class="form-control" id="teleponTenant" placeholder="Telepon" value="<?= $edit['telepon_tenant'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email_tenant" class="form-control" id="emailTenant" placeholder="Email" value="<?= $edit['email_tenant'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Fax</label>
                                        <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax" value="<?= $edit['fax'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Pemilik</label>
                                        <select name="id_user" id="idUser" class="form-control">
                                            <?php foreach ($user as $usr) : ?>
                                                <?php if ($usr->id_user == $edit['id_user']) : ?>
                                                    <option value="<?= $usr->id_user ?>" selected><?= $usr->id_user ?> | <?= $usr->nama_user ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $usr->id_user ?>"><?= $usr->id_user ?> | <?= $usr->nama_user ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat_tenant" id="alamatTenant" cols="30" rows="5" class="form-control"><?= $edit['alamat_tenant'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="<?= base_url('admin/c_admin/data_tenant') ?>" class="btn btn-danger float-right mb-5">Kembali</a>
                                    <button type="submit" class="btn btn-success float-right mr-3">Simpan</button>
                                </div>
                            </div>
                        </form>
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
    <!-- jQuery -->
</body>

</html>