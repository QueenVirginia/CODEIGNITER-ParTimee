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
                        <a href="<?= base_url('profile/edit') . $user['id_user']; ?>" class="__btn-edit btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</a>
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

    <!-- Edit Profile -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                    <div class="modal-body">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Your Name">
                        <label for="email" class="form-label mt-3">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>