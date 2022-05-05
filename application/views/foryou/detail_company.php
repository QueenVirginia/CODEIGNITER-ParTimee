<div class="__jobs-back">
    <a href="<?= base_url(); ?>foryou"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Back</a>
</div>

<div class="__company-detail">
    <div class="__company-detail-card">
        <div class="__company-detail-body card-body">
            <h1><?= $company['nama_company']; ?></h1>
            <div class="__company-detail-text">
                <div class="__company-detail-loc-situs">
                    <p class="__company-lokasi">Kantor Pusat<span><?= $company['kantor_pusat']; ?></span></p>
                    <p class="__company-industri">Industri<span><?= $company['industri']; ?></span></p>
                </div>
                <div class="__company-detail-loc-situs">
                    <p class="__company-situs">Situs<a href="<?= $company['situs']; ?>" target="__blank"><?= $company['situs']; ?></a></p>
                    <p class="__company-telepon">No Telepon<span><?= $company['no_telepon']; ?></span></p>
                </div>
            </div>
            <h2 class="__company-about">Tentang <?= $company['nama_company']; ?></h2>
            <p class="__company-desc"><?= $company['deskripsi']; ?></p>
        </div>
    </div>
    <div class="__company-detail-card __height">
        <div class="card-body __sizeof">
            <img src="<?= base_url('asset/company_img/') . $company['logo']; ?>" alt="" style="width: 200px; height: 200px">
            <p class="__rating">Rating <?= number_format((float)$company['rating'], 1, '.', ''); ?><img src="<?= base_url(); ?>asset/icon/rating.svg" alt="" style="width: 24px; height: 24px"></p>
        </div>
    </div>
</div>

<div class="__company-vacancy">
    <h1>Lowongan yang Tersedia</h1>
    <div class="__company-vacancy-container">
        <?php foreach ($company_job as $cj) : ?>
            <div class="__jobs-content-card card">
                <div class="">
                    <div class="__company-detail-header card-body">
                        <a href="<?= base_url(); ?>jobslist/detailJob/<?= $cj['id_job']; ?>" class="stretched-link"><?= $cj['nama_job']; ?></a>
                        <div class="__company-detail-text __column">
                            <div class="__job-content-loc">
                                <img src="<?= base_url(); ?>asset/icon/location.svg" alt="">
                                <p><?= $cj['lokasi']; ?> <span>(<?= $cj['tipe_kerja']; ?>)</span></p>
                            </div>
                            <div class="__job-content-loc">
                                <img src="<?= base_url(); ?>asset/icon/experiences.svg" alt="">
                                <p><?= $cj['batasan']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>