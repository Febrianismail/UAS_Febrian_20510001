<style>
    #example1_filter {
        width: 100% !important;
        margin-left: 160px;
    }

    .pagination {
        margin-left: 220px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus">Tambah Siswa</i></a>
                            <a href="<?=site_url('siswa/cetak_siswa')?>" class="btn btn-primary btn-sm" target="_blank" type="button"> <i class="ui primary button">Print</i></a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('pesan'); ?>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Alamat </th>
                                        <th>Nomor Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($siswa as $ssw) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ssw->nama_siswa ?>
                                            </td>
                                            <td><?= $ssw->kelas_siswa ?></td>
                                            <td><?= $ssw->alamat_siswa ?></td>
                                            <td><?= $ssw->nomor_telepon ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit<?= $ssw->id_siswa ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url('siswa/delete/' . $ssw->id_siswa) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $ssw->id_siswa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa/h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('siswa/edit/' . $ssw->id_siswa) ?>" method="POST">
                                                            <div class="form-grup">
                                                                <label>Nama</label>
                                                                <input type="text" name="nama_siswa" class="form-control" value="<?= $ssw->nama_siswa ?>">
                                                                <?= form_error('nama_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                                            </div>
                                                            <form action="">
                                                                <div class="form-grup">
                                                                    <label>Kelas</label>
                                                                    <input type="text" name="kelas_siswa" class="form-control" value="<?= $ssw->kelas_siswa ?>">
                                                                    <?= form_error('kelas_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                                                </div>
                                                                <form action="">
                                                                    <div class="form-grup">
                                                                        <label>Alamat</label>
                                                                        <textarea name="alamat_siswa" class="form-control"><?= $ssw->alamat_siswa ?></textarea>
                                                                        <?= form_error('alamat_siswa', '<div class="textt-small text-danger">', '</div>'); ?>
                                                                    </div>
                                                                    <form action="">
                                                                        <div class="form-grup">
                                                                            <label>Nomer Telepon</label>
                                                                            <input type="text" name="nomor_telepon" class="form-control" value="<?= $ssw->nomor_telepon ?>">
                                                                            <?= form_error('nomor_telepon', '<div class="textt-small text-danger">', '</div>'); ?>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
                                                                                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash">Reset</i></button>
                                                                            </div>
                                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </di