<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?> -->

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $jobs['id_job']?>">
                        <div class="form-group mt-3">
                            <label for="nama_job">Nama Job</label>
                            <input type="text" name="nama_job" class="form-control" id="nama_job" value="<?= $jobs['nama_job'] ?>">
                            <div class="form-text text-danger"><?= form_error('nama_job'); ?></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" id="perusahaan" value="<?= $jobs['perusahaan']; ?>">
                            <div class="form-text text-danger"><?= form_error('perusahaan'); ?></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select id="lokasi" class="form-select" name="lokasi">
                                <?php foreach ( $lokasi as $l ) : ?>
                                    <?php if ( $l == $jobs['lokasi'] ) : ?>
                                        <option value="<?= $l; ?>" selected><?= $l; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $l; ?>"><?= $l; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-end">Ubah Jobs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>