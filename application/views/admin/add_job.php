<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Add New Job</h1>

<div class="row mt-3 pl-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group mt-3">
                        <label for="nama_job">Job Name</label>
                        <input type="text" name="nama_job" class="form-control" id="nama_job">
                        <div class="form-text text-danger"><?= form_error('nama_job'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="lokasi">Location</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi">
                        <div class="form-text text-danger"><?= form_error('lokasi'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="batasan">Status</label>
                        <input type="text" name="batasan" class="form-control" id="batasan">
                        <div class="form-text text-danger"><?= form_error('batasan'); ?></div>
                    </div>
                    <!-- <div class="form-group mt-3">
                            <label for="tipe_kerja">Job Type</label>
                            <input type="text" name="tipe_kerja" class="form-control" id="tipe_kerja">
                            <div class="form-text text-danger"><?= form_error('tipe_kerja'); ?></div>
                        </div> -->
                    <div class="form-group mt-3">
                        <label for="tipe_kerja" class="form-label">Job Type</label>
                        <select id="tipe_kerja" class="custom-select" name="tipe_kerja">
                            <option value="Remote" selected>Remote</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="On-Site">On-Site</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="deskripsi_job">Description</label>
                        <textarea name="deskripsi_job" class="form-control" id="deskripsi_job" rows="5"></textarea>
                        <div class="form-text text-danger"><?= form_error('deskripsi_job'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="benefit_job">Benefit</label>
                        <textarea name="benefit_job" class="form-control" id="benefit_job" rows="5"></textarea>
                        <div class="form-text text-danger"><?= form_error('benefit_job'); ?></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="link_apply">Apply Link</label>
                        <input type="text" name="link_apply" class="form-control" id="link_apply">
                        <div class="form-text text-danger"><?= form_error('link_apply'); ?></div>
                    </div>
                    <!-- <div class="form-group mt-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <select id="lokasi" class="form-select" name="lokasi">
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Bekasi">Bekasi</option>
                        </select>
                    </div> -->
                    <button type="submit" name="add_job" class="btn btn-primary float-end">Save Jobs</button>
                </form>
            </div>
        </div>
    </div>
</div>