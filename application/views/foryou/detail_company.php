<div class="__jobs-back">
    <a href="<?= base_url(); ?>foryou"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Back</a>
</div>

<div class="__company-detail">
    <div class="__company-detail-card">
        <div class="__company-detail-body card-body">
            <h1 class="__company-name"><?= $company['nama_company']; ?></h1>
            <div class="__company-detail-text">
                <div class="__company-detail-loc-situs">
                    <p class="__company-lokasi">Kantor Pusat<span><?= $company['kantor_pusat']; ?></span></p>
                    <p class="__company-situs">Situs<a href="<?= $company['situs']; ?>" target="__blank"><?= $company['situs']; ?></a></p>
                </div>
                <p class="__company-industri">Industri<span><?= $company['industri']; ?></span></p>
            </div>
            <h2 class="__company-about">About <?= $company['nama_company']; ?></h2>
            <p class="__company-desc"><?= $company['deskripsi']; ?></p>
        </div>
    </div>
    <div class="__company-detail-card __height">
        <div class="card-body __sizeof">
            <img src="<?= base_url(); ?>asset/img/background.jpg" alt="" style="width: 200px; height: 200px">
            <p class="__rating">Rating <?= $company['rating']; ?><img src="<?= base_url(); ?>asset/icon/rating.svg" alt="" style="width: 24px; height: 24px"></p>
        </div>
    </div>
</div>

<div class="__company-vacancy">
    <h1>Jobs Vacancy</h1>
    <div class="__company-vacancy-container">
        <div class="__jobs-content-card card">
            <div class="">
                <div class="__company-detail-header card-body">
                    <a href="" class="stretched-link">UI/UX Designer</a>
                    <div class="__company-detail-text">
                        <div class="__job-content-loc">
                            <img src="<?= base_url(); ?>asset/icon/location.svg" alt="">
                            <p>Jakarta <span>(Remote)</span></p>
                        </div>
                        <div class="__job-content-exp">
                            <img src="<?= base_url(); ?>asset/icon/experiences.svg" alt="">
                            <p>Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>