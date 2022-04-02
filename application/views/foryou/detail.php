<div class="container">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <h5 class="card-header">Detail Data</h5>
                <div class="card-body">
                    <h5 class="card-title"><?= $jobs['nama_job']; ?></h5>
                    <p class="card-text text-muted"><?= $jobs['perusahaan']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['lokasi']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['batasan']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['rating']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['tipe_kerja']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['deskripsi_job']; ?></p>
                    <p class="card-text text-muted"><?= $jobs['benefit_job']; ?></p>
                    <a href="<?= base_url(); ?>foryou" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>