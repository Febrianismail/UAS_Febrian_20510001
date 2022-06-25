<style>
    #example1_filter {
        width: 100% !important;
        margin-left: 160px;
    }

    .pagination {
        margin-left: 220px;
    }
</style>
<link href="<?=base_url('assets')?>/vendor/semantic/dist/semantic.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Guru</li>
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
                        <div class="card-header" class="one wide column">
                            <a href="<?= base_url('guru/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus">Tambah Guru</i></a>
                            <a href="<?=site_url('guru/cetak_guru')?>" class="btn btn-primary btn-sm" target="_blank" type="button"> <i class="ui primary button">Print</i></a>
                        </div>
                        
                        <div class="card-body">
                            <?= $this->session->flashdata('pesan'); ?>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Bidang Studi</th>
                                        <th>walikelas</th>
                                        <th>Alamat </th>
                                        <th>Nomor Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($guru as $ssw) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ssw->nama_guru ?>
                                            </td>
                                            <td><?= $ssw->bidang_studi ?></td>
                                            <td><?= $ssw->walikelas ?></td>
                                            <td><?= $ssw->alamat_guru ?></td>
                                            <td><?= $ssw->nomor_telepon ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit<?= $ssw->id_guru ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url('guru/delete/' . $ssw->id_guru) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="edit<?= $ssw->id_guru ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('guru/edit/' . $ssw->id_guru) ?>" method="POST">
                                                            <div class="form-grup">
                                                                <label>Nama guru</label>
                                                                <input type="text" name="nama_guru" class="form-control" value="<?= $ssw->nama_guru ?>">
                                                                <?= form_error('nama_guru', '<div class="textt-small text-danger">', '</div>'); ?>
                                                            </div>
                                                            <form action="">
                                                                <div class="form-grup">
                                                                    <label>Bidang studi</label>
                                                                    <input type="text" name="bidang_studi" class="form-control" value="<?= $ssw->bidang_studi ?>">
                                                                    <?= form_error('bidang_studi', '<div class="textt-small text-danger">', '</div>'); ?>
                                                                </div>
                                                                <form action="">
                                                                    <div class="form-grup">
                                                                        <label>Alamat guru</label>
                                                                        <textarea name="alamat_guru" class="form-control"><?= $ssw->alamat_guru ?></textarea>
                                                                        <?= form_error('alamat_guru', '<div class="textt-small text-danger">', '</div>'); ?>
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