<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data
                </div>
                <div class="card-body">
                    <!-- <?php if(validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?> -->

                    <form action="" method="POST">
                        <div class="form-group mt-3">
                            <label for="nama_job">Nama Job</label>
                            <input type="text" name="nama_job" class="form-control" id="nama_job">
                            <div class="form-text text-danger"><?= form_error('nama_job'); ?></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" id="perusahaan">
                            <div class="form-text text-danger"><?= form_error('perusahaan'); ?></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select id="lokasi" class="form-select" name="lokasi">
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Bekasi">Bekasi</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-end">Tambah Jobs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>