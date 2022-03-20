<h1 class="h3 mb-4 pl-4 text-gray-800">Profile</h1>

<div class="card mb-3 ml-4" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url('asset_admin/img/') . $user['foto']; ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title text-dark" style="font-weight: bold;"><?= $user['nama']; ?></h5>
                <p class="card-text"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Created since <?= date('d F Y', $user['tanggal_buat']); ?></small></p>
            </div>
        </div>
    </div>
</div>