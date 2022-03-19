<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Edit Job</h1>

<form action="" method="POST" class="mb-4 pl-4 col-md-8">
    <input type="hidden" name="id" value="<?= $jobs['id_job'] ?>">
    <div class="form-group mt-3">
        <label for="nama_job">Job Name</label>
        <input type="text" name="nama_job" class="form-control" id="nama_job" value="<?= $jobs['nama_job'] ?>">
        <div class="form-text text-danger"><?= form_error('nama_job'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="lokasi">Location</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $jobs['lokasi'] ?>">
        <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="batasan">Status</label>
        <input type="text" name="batasan" class="form-control" id="batasan" value="<?= $jobs['batasan'] ?>">
        <div class="form-text text-danger"><?= form_error('batasan'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="tipe_kerja" class="form-label">Job Type</label>
        <select id="tipe_kerja" class="custom-select" name="tipe_kerja">
            <?php foreach ($tipe_kerja as $tk) : ?>
                <?php if ($tk == $jobs['tipe_kerja']) : ?>
                    <option value="<?= $tk; ?>" selected><?= $tk; ?></option>
                <?php else : ?>
                    <option value="<?= $tk; ?>"><?= $tk; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group mt-3">
        <label for="deskripsi_job">Description</label>
        <textarea name="deskripsi_job" class="form-control" id="deskripsi_job" rows="5"><?= $jobs['deskripsi_job'] ?></textarea>
        <div class="form-text text-danger"><?= form_error('deskripsi_job'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="benefit_job">Benefit</label>
        <textarea name="benefit_job" class="form-control" id="benefit_job" rows="5"><?= $jobs['benefit_job'] ?></textarea>
        <div class="form-text text-danger"><?= form_error('benefit_job'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="link_apply">Apply Link</label>
        <input type="text" name="link_apply" class="form-control" id="link_apply" value="<?= $jobs['link_apply'] ?>">
        <div class="form-text text-danger"><?= form_error('link_apply'); ?></div>
    </div>
    <button type="submit" name="add_job" class="btn btn-primary float-end">Save Job</button>
</form>