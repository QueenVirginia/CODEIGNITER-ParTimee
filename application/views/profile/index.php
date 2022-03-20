<div class="__profile">
    <div class="__profile-header">
        <h1>Profile</h1>
    </div>

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
            <a href="<?= base_url() ?>auth/logout" class="__btn-logout btn btn-outline-danger">LOGOUT</a>
        </div>
    </div>

    <div class="__profile-desc-jobs">
        <div class="__profile-desc">
            <h1>Profile Detail</h1>
            <div class="__profile-form">
                <h2>Phone Number</h2>
                <p>
                    021-12345567
                </p>
            </div>
            <div class="__profile-form">
                <h2>Social Media Account</h2>
                <div class="__text-change __social-media" style="margin-bottom: 16px;">
                    <h2 class="__text-width">Facebook</h2>
                    <p>
                        Jane Doe
                    </p>
                </div>
                <div class="__text-change __social-media" style="margin-bottom: 16px;">
                    <h2 class="__text-width">Instagram</h2>
                    <p>
                        Jane Doe
                    </p>
                </div>
                <div class="__text-change __social-media" style="margin-bottom: 16px;">
                    <h2 class="__text-width">LinkedIn</h2>
                    <p>
                        Jane Doe
                    </p>
                </div>
            </div>
            <div class="__profile-form">
                <h2>CV File</h2>
                <p>
                    cv.pdf
                </p>
            </div>
        </div>
        <div class="__profile-jobs">
            <div class="__jobs-apply">
                <h1>Jobs Apply</h1>
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