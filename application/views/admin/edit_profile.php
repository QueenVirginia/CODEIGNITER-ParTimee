<a class="pl-4" href="<?= base_url(); ?>admin/profile"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Kembali</a>

<h1 class="h3 mb-4 pl-4 text-gray-800">Ubah Profil</h1>

<div class="mb-4 pl-4 col-md-6">
    <?= form_open_multipart('admin/edit_profile') ?>
    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" readonly>
    </div>
    <div class="form-group mt-3">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama'] ?>">
        <div class="form-text text-danger"><?= form_error('nama'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="foto">Foto Profil</label>
        <div class="row">
            <div class="col-sm-3">
                <img src="<?= base_url('asset/profile_img/') . $user['foto']; ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="foto" name="foto" style="height: fit-content;">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" name="edit_profile" class="btn btn-primary float-end">Simpan Perubahaan</button>
    </form>
</div>