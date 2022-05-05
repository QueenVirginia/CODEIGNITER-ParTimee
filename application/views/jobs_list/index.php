<div class="__search-filter">
  <div class="__search">
    <form action="" method="POST">
      <div class="__input-group input-group">
        <span class="__input-group-text input-group-text"><img src="<?= base_url(); ?>asset/icon/search.svg" class="input-group-text" alt=""></span>
        <input type="text" class="__input-form form-control" placeholder="Temukan Lowogan Part Time" name="cari_kerja">
        <button type="submit" class="__btn-find-job btn">Temukkan Pekerjaan</button>
      </div>
      <p class="mt-2 text-muted" style="font-size: 12px;">*Anda dapat mencari lowongan berdasarkan nama pekerjaan, nama perusahaan, lokasi, tipe kerja, atau batasan.</p>
    </form>
  </div>
</div>

<div class="__jobs-total">
  <h1>Lowongan Part Time</h1>
</div>

<?php if (empty($jobs)) : ?>
  <div class="__empty-state">
    <h1>Maaf</h1>
    <p class="text-muted">Kami tidak bisa menemukan pekerjaan yang Anda cari.</p>
    <a href="<?= base_url(); ?>jobslist" class="__btn-back-to-jobs btn btn-primary">Kembali ke Lowongan</a>
  </div>
<?php endif; ?>

<div class="__jobs-list-content">
  <div class="__jobs-content">
    <?php foreach ($jobs as $j) : ?>
      <div class="__jobs-content-card card">
        <div class="__jobs-content-text">
          <img src="<?= base_url('asset/company_img/') . $j['logo']; ?>" class="card-img-top" alt="">
          <div class="__job-content-header card-body">
            <a href="<?= base_url(); ?>jobslist/detailJob/<?= $j['id_job']; ?>" class="stretched-link"><?= $j['nama_job']; ?></a>
            <p>
              <?= $j['nama_company']; ?><span><?= number_format((float)$j['rating'], 1, '.', ''); ?><img src="<?= base_url(); ?>asset/icon/rating.svg" alt=""></span>
            </p>
            <div class="__job-content-detail">
              <div class="__job-content-loc">
                <img src="<?= base_url(); ?>asset/icon/location.svg" alt="">
                <p><?= $j['lokasi']; ?> <span>(<?= $j['tipe_kerja']; ?>)</span></p>
              </div>
              <div class="__job-content-loc">
                <img src="<?= base_url(); ?>asset/icon/experiences.svg" alt="">
                <p><?= $j['batasan']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>