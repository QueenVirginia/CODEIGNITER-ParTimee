<div class="__profile">
    <div class="__profile-header">
        <h1>Profile</h1>
    </div>
    <!-- 
    <div class="__profile-detail">
        <div class="__profile-photo">
            <img src="<?= base_url('asset/profile_img/') . $user['foto']; ?>" alt="">
            <div class="__profile-name">
                <h1><?= $user['nama']; ?></h1>
                <p><?= $user['email']; ?></p>
                <h6 class="mt-3 text-muted fw-light">Created since <?= date('d F Y', $user['tanggal_buat']); ?></h6>
            </div>
        </div>
        <div class="__btn-edit-logout">
            <a href="" class="__btn-edit btn btn-primary">EDIT</a>
        </div>
    </div> -->

    <?= form_error('nama', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>

    <?= form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>

    <?= $this->session->flashdata('msg') ?>

    <div class="__profile-desc-jobs">
        <div class="__profile-desc">
            <h1>Profile Detail</h1>
            <div class="__profile-photo">
                <img src="<?= base_url('asset/profile_img/') . $user['foto']; ?>" alt="">
                <div class="__profile-name">
                    <h1><?= $user['nama']; ?></h1>
                    <p><?= $user['email']; ?></p>
                    <h6 class="mt-2 text-muted fw-light">Created since <?= date('d F Y', $user['tanggal_buat']); ?></h6>
                    <div class="__btn-edit-logout">
                        <a href="<?= base_url('profile/edit'); ?>" class="__btn-edit btn btn-outline-primary">EDIT</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="__profile-jobs">
            <div class="__jobs-apply">
                <h1>Application</h1>
                <p>2 Jobs</p>
            </div>
            <div class="__jobs-apply-list">
                <div class="__form-jobs">
                    <h2>Tokopedia</h2>
                    <p>UI/UX Designer</p>
                </div>
                <div class="__btn-response">
                    <button class="__btn-nores btn btn-danger" type="submit">NO RESPONSE</button>
                    <button class="__btn-haveres btn btn-success" type="submit">HAVE RESPONSE</button>
                </div>
            </div>
        </div>
    </div>
</div>