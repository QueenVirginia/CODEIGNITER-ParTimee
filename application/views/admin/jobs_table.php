<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kelola Lowongan</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <div class="d-flex justify-content-end">
        <!-- Add Jobs -->
        <div class="col-md-6 mb-4 mr-auto">
            <a href="<?= base_url(); ?>admin/add_job/" class="btn btn-primary btn-lg"><i class="fas fa-plus fa-sm"></i>&nbsp; Tambah lowongan baru</a>
        </div>

        <!-- Topbar Search -->
        <form method="POST" class="d-none d-sm-inline-block form-inline mb-md-4 mx-auto col-6 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Cari berdasarkan ID Lowongan, Nama Pekerjaan, Lokasi, Status atau Tipe Pekerjaan..." name="cari_job">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Pop Up Message -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Lowongan baru <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Lowongan</th>
                            <th>Nama Pekerjaan</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Tipe Pekerjaan</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jobs)) : ?>
                            <div class="__empty-state mb-4 text-center">
                                <h1>Sorry</h1>
                                <p class="text-muted">Kami tidak menemukan pekerjaan yang Anda cari.</p>
                                <a href="<?= base_url(); ?>admin/job_list" class="__btn-back-to-jobs btn btn-primary">Kembali</a>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($jobs as $j) : ?>
                            <tr>
                                <td><?= $j['id_job']; ?></td>
                                <td><?= $j['nama_job']; ?></td>
                                <td><?= $j['lokasi']; ?></td>
                                <td><?= $j['batasan']; ?></td>
                                <td><?= $j['tipe_kerja']; ?></td>
                                <td><?= $j['link_apply']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/detail_job/<?= $j['id_job']; ?>" class="btn btn-primary">Lihat</a>
                                    <a href="<?= base_url(); ?>admin/edit_job/<?= $j['id_job']; ?>" class="btn btn-success">Ubah</a>
                                    <a href="<?= base_url(); ?>admin/delete_job/<?= $j['id_job']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->