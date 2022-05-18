<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kelola User</h1>

    <!-- Topbar Search -->
    <form method="POST" class="d-none d-sm-inline-block form-inline mb-md-4 mx-auto col-6 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-white border-0 small" placeholder="Cari berdasarkan ID, Nama atau Email..." name="cari_user">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Pop Up Message -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            User <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
                            <th>ID User</th>
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($user_data)) : ?>
                            <div class="__empty-state mb-4 text-center">
                                <h1>Maaf</h1>
                                <p class="text-muted">Kami tidak menemukan user yang Anda cari.</p>
                                <a href="<?= base_url(); ?>admin/user_list" class="__btn-back-to-jobs btn btn-primary">Kembali</a>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($user_data as $u) : ?>
                            <tr>
                                <td><?= $u['id_user']; ?></td>
                                <td><img src="<?= base_url('asset/profile_img/') . $u['foto']; ?>" width="60px" height="60px"></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td>
                                    <!-- <a href="<?= base_url(); ?>admin/detail_user/<?= $u['id_user']; ?>" class="btn btn-primary">Lihat</a> -->
                                    <a href="<?= base_url(); ?>admin/delete_user/<?= $u['id_user']; ?>" class="btn btn-danger">Hapus</a>
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