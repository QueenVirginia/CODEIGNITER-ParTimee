<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kelola Perusahaan</h1>

    <div class="d-flex justify-content-end">
        <!-- Add Jobs -->
        <div class="col-md-6 mb-4 mr-auto">
            <a href="<?= base_url(); ?>admin/add_company/" class="btn btn-primary btn-lg"><i class="fas fa-plus fa-sm"></i>&nbsp; Tambah Perusahaan Baru</a>
        </div>

        <!-- Topbar Search -->
        <form method="POST" class="d-none d-sm-inline-block form-inline mb-md-4 mx-auto col-6 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Cari berdasarkan ID Perusahaan, Nama Perusahaan, Kantor Pusat atau Industri..." name="cari_company">
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
            Perusahaan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
                            <th>ID Perusahaan</th>
                            <th>Logo</th>
                            <th>Nama Perusahaan</th>
                            <th>Kantor Pusat</th>
                            <th>Rating</th>
                            <th>Industri</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($company)) : ?>
                            <div class="__empty-state mb-4 text-center">
                                <h1>Maaf</h1>
                                <p class="text-muted">Kami tidak dapat menemukan perusahaan yang Anda cari.</p>
                                <a href="<?= base_url(); ?>admin/company_list" class="__btn-back-to-jobs btn btn-primary">Kembali</a>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($company as $c) : ?>
                            <tr>
                                <td><?= $c['id_company']; ?></td>
                                <td><img src="<?= base_url('asset/company_img/') . $c['logo']; ?>" width="60px" height="60px"></td>
                                <td><?= $c['nama_company']; ?></td>
                                <td><?= $c['kantor_pusat']; ?></td>
                                <td><?= number_format((float)$c['rating'], 1, '.', ''); ?></td>
                                <td><?= $c['industri']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/detail_company/<?= $c['id_company']; ?>" class="btn btn-primary">Lihat</a>
                                    <a href="<?= base_url(); ?>admin/edit_company/<?= $c['id_company']; ?>" class="btn btn-success">Ubah</a>
                                    <a href="<?= base_url(); ?>admin/delete_company/<?= $c['id_company']; ?>" class="btn btn-danger">Hapus</a>
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