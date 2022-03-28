<h1 class="h3 mb-4 pl-4 text-gray-800">Profile</h1>

<div class="mb-2 ml-4" style="max-width: 540px;">
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Profile <?= $this->session->flashdata('flash'); ?> <strong>Succesfully</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
</div>

<div class="card mb-3 ml-4" style="max-width: 540px;">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= base_url('asset_admin/img/') . $user['foto']; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title text-dark mb-0" style="font-weight: bold;"><?= $user['nama']; ?></h5>
                <p class="card-text mb-2"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Created since <?= date('d F Y', $user['tanggal_buat']); ?></small></p>
                <a href="<?= base_url('admin/edit_profile'); ?>" class="__btn-edit btn btn-primary">EDIT</a>
            </div>
        </div>
    </div>
</div>