<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Kelola Lamaran</h1>

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
                                    <!-- <a href="<?= base_url(); ?>admin/delete_apply/<?= $a['id_apply']; ?>" class="btn btn-danger">Hapus</a> -->
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