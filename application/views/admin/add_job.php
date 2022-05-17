<!-- Page Heading -->
<a class="pl-4" href="<?= base_url(); ?>admin/job_list"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Kembali</a>

<h1 class="h3 mb-4 pl-4 text-gray-800">Tambah Lowongan Baru</h1>

<div class="row mt-3 pl-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mt-3">
                        <label for="nama_job">Nama Pekerjaan</label>
                        <input type="text" name="nama_job" class="form-control" id="nama_job" value="<?= set_value('nama_job'); ?>">
                        <div class=" form-text text-danger"><?= form_error('nama_job'); ?>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= set_value('lokasi'); ?>">
                        <div class=" form-text text-danger"><?= form_error('lokasi'); ?>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="batasan">Status</label>
                        <input type="text" name="batasan" class="form-control" id="batasan" value="<?= set_value('batasan'); ?>">
                        <div class=" form-text text-danger"><?= form_error('batasan'); ?>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nama_company" class="form-label">Nama Perusahaan</label>
                        <select id="nama_company" class="custom-select" name="nama_company">
                            <?php foreach ($company as $nc) : ?>
                                <option value="<?= $nc['nama_company']; ?>" selected><?= $nc['nama_company']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tipe_kerja" class="form-label">Tipe Pekerjaan</label>
                        <select id="tipe_kerja" class="custom-select" name="tipe_kerja">
                            <option value="Remote" selected>Remote</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="On-Site">On-Site</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="deskripsi_job">Deskripsi</label>
                        <textarea name="deskripsi_job" class="form-control" id="deskripsi_job" rows="10" value="<?= set_value('deskripsi_job'); ?>"></textarea>
                        <div class=" form-text text-danger"><?= form_error('deskripsi_job'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="benefit_job">Keuntungan</label>
                        <textarea name="benefit_job" class="form-control" id="benefit_job" rows="5" value="<?= set_value('benefit_job'); ?>"></textarea>
                        <div class="form-text text-danger"><?= form_error('benefit_job'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="link_apply">Link Lamaran</label>
                        <input type="text" name="link_apply" class="form-control" id="link_apply" value="<?= set_value('link_job'); ?>">
                        <div class="form-text text-danger"><?= form_error('link_apply'); ?></div>
                    </div>
                    <button type="submit" name="add_job" class="btn btn-primary float-end">Simpan Lowongan</button>
                </form>
            </div>
        </div>
    </div>
</div>