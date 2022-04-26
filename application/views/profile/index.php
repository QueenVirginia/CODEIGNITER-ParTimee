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

    <!-- <?= form_error('nama', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>

    <?= form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?> -->

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
            </div>
            <?php foreach ($apply as $a) : ?>
                <div class="__jobs-apply-list">
                    <div class="__form-jobs">
                        <h2><?= $a['nama_job']; ?></h2>
                        <p><?= $a['nama_company']; ?></p>
                    </div>
                    <div class="__btn-response">
                        <a type="button" href="<?= base_url(); ?>profile/delete/<?= $a['id_apply']; ?>" class="__btn-nores btn btn-danger" type="submit">Unmarked</a>
                        <button class="__btn-haveres btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $a['id_apply']; ?>" aria-expanded="false" aria-controls="collapseExample">Get In? Rating Your Experience</button>
                    </div>
                </div>
                <div class="collapse" id="collapseExample<?= $a['id_apply']; ?>">
                    <div class="card card-body __card-rating" style="margin-bottom: 20px;">
                        <form action="<?= base_url(); ?>profile/add_rating" method="POST">
                            <input type="hidden" class="form-control" name="id_apply" value="<?= $a['id_apply']; ?>">
                            <input type="hidden" class="form-control" name="id_company" value="<?= $a['id_company']; ?>">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="__rating-content">
                                <select class="form-select" id="rating" aria-label="Default select example" name="rating">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button type="submit" name="add_rating" class="btn btn-primary __add-rating-btn">Add Rating</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Input Rating Modal -->
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rate Your Experience!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url(); ?>profile/add_rating" method="POST">
                                <input type="hidden" class="form-control" name="id_apply" value="<?= $a['id_apply']; ?>">
                                <div class="modal-body">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select class="form-select" id="rating" aria-label="Default select example" name="rating">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="add_rating" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
            <?php endforeach ?>
        </div>
    </div>
</div>