<div class="__subheader">
    <h1>Rekomendasi Untuk Anda</h1>
</div>

<?php foreach ($rec as $nama_company => $apply_rating) : ?>
    <div class="__rec-company">
        <div class="__jobs-company-card __rec-company-container" style="padding-bottom: 16px;">
            <img src="asset/img/hero.png" class="card-img-top" alt="...">
            <div class="__jobs-company-body card-body">
                <a class="card-title" style="text-decoration: none; color: #3A3A3A">
                    <p><?= $nama_company; ?></p>
                    <span>
                        <img src="asset/icon/rating.svg" alt="">
                        <p><?= number_format((float)$apply_rating, 1, '.', ''); ?></p>
                    </span>
                </a>
                <!-- <div class="__job-content-detail">
                    <div class="__job-content-loc">
                        <img src="asset/icon/location.svg" alt="" style="width: 20px; height: 20px;">
                        <p>Jakarta</p>
                    </div>
                    <div class="__job-content-exp">
                        <img src="asset/icon/experiences.svg" alt="" style="width: 20px; height: 20px;">
                        <p>1 Lowongan</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<?php endforeach ?>

<div class="__subheader">
    <h1>Perusahaan</h1>
</div>

<div class="__rec-company">
    <?php foreach ($company as $c) : ?>
        <div class="__jobs-company-card __rec-company-container card">
            <div class="__container-card __rec-company-card">
                <img src="<?= base_url('asset/company_img/') . $c['logo']; ?>" class="card-img-top" alt="...">
                <div class="__jobs-company-body card-body">
                    <a href="<?= base_url(); ?>foryou/detail/<?= $c['id_company']; ?>" style="text-decoration: none; color: #424242;" class="stretched-link"><?= $c['nama_company']; ?></a>
                    <span><?= $c['rating']; ?> <img src="asset/icon/rating.svg" alt=""></span>
                    <div class="mt-2 __job-content-detail">
                        <div class="__job-content-loc">
                            <img src="asset/icon/location.svg" alt="" style="width: 20px; height: 20px;">
                            <p><?= $c['kantor_pusat']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__jobs-company-apply card-body">
                <div class="__job-content-exp">
                    <img src="asset/icon/experiences.svg" alt="" style="width: 20px; height: 20px;">
                    <p><?= $c['count']; ?> Pekerjaan Tersedia</p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- 
<div class="container">
    <?php if ($this->session->flashdata()) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jobs<strong> berhasil </strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>foryou/tambah" class="btn btn-primary">Tambah Jobs</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Jobs" name="keyword">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Jobs</h3>
            <?php if (empty($jobs)) : ?>
                <div class="alert alert-danger" role="alert">
                    data jobs tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($jobs as $j) : ?>
                    <li class="list-group-item">
                        <?= $j['nama_job']; ?>
                        <a href="<?= base_url(); ?>foryou/hapus/<?= $j['id_job']; ?>" class="badge badge bg-danger float-end" onclick="return confirm('Yakin?');">Hapus</a>
                        <a href="<?= base_url(); ?>foryou/detail/<?= $j['id_job']; ?>" class="badge badge bg-primary float-end">detail</a>
                        <a href="<?= base_url(); ?>foryou/ubah/<?= $j['id_job']; ?>" class="badge badge bg-success float-end">ubah</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <a href="<?= base_url(); ?>foryou/companydetail" class="btn btn-primary">Company</a>
</div> -->