<div class="__search-filter">
    <div class="__search">
        <form action="" method="POST">
            <div class="__input-group input-group">
                <span class="__input-group-text input-group-text"><img src="<?= base_url(); ?>asset/icon/search.svg" class="input-group-text" alt=""></span>
                <input type="text" class="__input-form form-control" placeholder="Temukan Perusahaan" name="cari_company">
                <button type="submit" class="__btn-find-job btn">Temukan Perusahaan</button>
            </div>
        </form>
    </div>
</div>

<?php if (!empty($rec)) : ?>
    <div class="__subheader">
        <h1>Rekomendasi Untuk Anda</h1>
    </div>

    <div class="__rec-company">
        <?php foreach ($rec as $nama_company => $apply_rating) : ?>
            <?php

            $this->db->select('company.id_company, count(company.id_company) as count, company.nama_company, company.logo, company.kantor_pusat, AVG(apply.rating) as rating');
            $this->db->from('company');
            $this->db->join('apply', 'apply.id_company = company.id_company');
            $this->db->where('nama_company', $nama_company);
            $this->db->group_by('company.id_company');
            $data_company = $this->db->get()->result_array();

            ?>
            <?php foreach ($data_company as $dc) : ?>
                <div class="__jobs-company-card __rec-company-container card">
                    <div class="__container-card __rec-company-card">
                        <img src="<?= base_url('asset/company_img/') . $dc['logo']; ?>" class="card-img-top">
                        <div class="__jobs-company-body card-body">
                            <a href="<?= base_url(); ?>foryou/detail/<?= $dc['id_company']; ?>" style="text-decoration: none; color: #424242;" class="stretched-link"><?= $dc['nama_company']; ?></a>
                            <span><?= number_format((float)$dc['rating'], 1, '.', ''); ?> <img src="asset/icon/rating.svg" alt=""></span>
                            <div class="mt-2 __job-content-detail">
                                <div class="__job-content-loc">
                                    <img src="asset/icon/location.svg" alt="" style="width: 20px; height: 20px;">
                                    <p><?= $dc['kantor_pusat']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="__jobs-company-apply card-body">
                        <div class="__job-content-exp">
                            <img src="asset/icon/experiences.svg" alt="" style="width: 20px; height: 20px;">
                            <p><?= $dc['count']; ?> Pekerjaan Tersedia</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach ?>
    </div>
<?php endif; ?>

<div class="__subheader">
    <h1>Perusahaan</h1>
</div>

<?php if (empty($company)) : ?>
    <div class="__empty-state">
        <h1>Maaf!</h1>
        <p class="text-muted">Perusahaan yang Anda cari belum terdaftar.</p>
        <a href="<?= base_url(); ?>foryou" class="__btn-back-to-company btn btn-primary">Kembali ke Perusahaan</a>
    </div>
<?php endif; ?>

<div class="__rec-company" style="margin-bottom: 60px" ;>
    <?php foreach ($company as $c) : ?>
        <div class="__jobs-company-card __rec-company-container card">
            <div class="__container-card __rec-company-card">
                <img src="<?= base_url('asset/company_img/') . $c['logo']; ?>" class="card-img-top" alt="...">
                <div class="__jobs-company-body card-body">
                    <a href="<?= base_url(); ?>foryou/detail/<?= $c['id_company']; ?>" style="text-decoration: none; color: #424242;" class="stretched-link"><?= $c['nama_company']; ?></a>
                    <span><?= number_format((float)$c['rating'], 1, '.', ''); ?> <img src="asset/icon/rating.svg" alt=""></span>
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