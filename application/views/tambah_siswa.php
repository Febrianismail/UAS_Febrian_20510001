<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= base_url('siswa/tambah_aksi') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama </label>
                                    <input type="text" name="nama_siswa" class="form-control">
                                    <?= form_error('nama_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kelas </label>
                                    <input type="text" name="kelas_siswa" class="form-control">
                                    <?= form_error('kelas_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat </label>
                                    <textarea name="alamat_siswa" class="form-control"></textarea>
                                    <?= form_error('alamat_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomer Telepon</label>
                                    <input type="text" name="nomor_telepon" class="form-control">
                                    <?= form_error('nomor_telepon', '<div class="textt-small text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>