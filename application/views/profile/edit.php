<div class="__jobs-back">
    <a href="<?= base_url(); ?>profile"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Back</a>
</div>

<div class="__profile" style="margin-top: 24px;">
    <div class="__profile-header">
        <h1>Edit Profile</h1>
    </div>

    <div class="card col-md-8">
        <?= form_open_multipart('profile/edit') ?>
        <div class="p-4">
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('asset/profile_img/') . $user['foto']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end pb-4">
            <div class="col-sm-10">
                <button type="submit" name="edit" class="__btn-edit btn btn-outline-primary" style="width: 200px;">SAVE CHANGES</button>
            </div>
        </div>
        </form>
    </div>
</div>