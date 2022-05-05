<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Kelola Lamaran</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- Topbar Search -->
    <!-- <form method="POST" class="d-none d-sm-inline-block form-inline mb-md-4 mx-auto col-6 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-white border-0 small" placeholder="Cari berdasarkan Nama User..." name="cari_apply">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Pop Up Message -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Lamaran <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Lamaran</th>
                            <th>Nama User</th>
                            <th>Nama Pekerjaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Rating</th>
                            <th>Respon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($apply as $a) : ?>
                            <tr>
                                <td><?= $a['id_apply']; ?></td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['nama_job']; ?></td>
                                <td><?= $a['nama_company']; ?></td>
                                <td><?= $a['rating_apply']; ?></td>
                                <td><?= $a['response']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/detail_apply/<?= $a['id_user']; ?>" class="btn btn-primary">Rekomendasi</a>
                                    <a href="<?= base_url(); ?>admin/delete_apply/<?= $a['id_apply']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>