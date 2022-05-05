<input type="hidden" class="form-control" name="company_id" value="<?= $jobs['id_company']; ?>">
<input type="hidden" class="form-control" name="user_id" value="<?= $user['id_user']; ?>">

<div class="__jobs-back">
  <a href="<?= base_url(); ?>jobslist"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Kembali</a>
  <div class="mt-4">
    <?= $this->session->flashdata('msg_apply') ?>
  </div>
</div>

<div class="__jobs-description">
  <div class="__jobs-description-card card">
    <div class="__jobs-description-text">
      <img src="<?= base_url('asset/company_img/') . $jobs['logo']; ?>" class="__jobs-img card-img-top" alt="...">
      <div class="__jobs-description-header card-body">
        <div class="__jobs-title-company">
          <h1><?= $jobs['nama_job']; ?></h1>
          <!-- <p>
            <?= $jobs['nama_company']; ?><span><?= $jobs['rating']; ?><img src="<?= base_url(); ?>asset/icon/rating.svg" alt="" style="width: 20px; height: 20px;"></span>
          </p> -->
        </div>
        <div class="__jobs-description-detail">
          <div class="__jobs-description-detail-icon">
            <img src="<?= base_url(); ?>asset/icon/location.svg" alt="">
            <p><?= $jobs['lokasi']; ?> <span>(<?= $jobs['tipe_kerja']; ?>)</span></p>
          </div>
          <div class="__jobs-description-detail-icon">
            <img src="<?= base_url(); ?>asset/icon/experiences.svg" alt="">
            <p><?= $jobs['batasan']; ?></p>
          </div>
          <div class="__jobs-description-detail-icon">
            <img src="<?= base_url(); ?>asset/icon/company.svg" alt="">
            <p><?= $jobs['industri']; ?></p>
          </div>
        </div>
        <div class="__jobs-description-button">
          <form action="" method="POST">
            <input type="hidden" class="form-control" name="id_job" value="<?= $jobs['id_job']; ?>">
            <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']; ?>">
            <input type="hidden" class="form-control" name="link_apply" value="<?= $jobs['link_apply']; ?>">

            <div class="__jobs-description-button-group __jobs-justify">
              <a href="<?= $jobs['link_apply']; ?>" target="_blank" class="__btn-apply btn btn-primary">Lamar Sekarang</a>

              <div class="__jobs-description-button-group">
                <p style="margin-right: 10px;">Sudah Melamar?</p>
                <input type="submit" name="addApply" class="__btn-apply btn btn-outline-primary" value="Marked">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr style="margin-top: 24px; margin-bottom: 24px; border-color: #9A9A9A">
    <div class="__jobs-description-content">
      <div class="__desc-title mb-4">
        <h1>Deskripsi</h1>
        <textarea class="form-control __textarea" rows="10" disabled><?= $jobs['deskripsi_job']; ?></textarea>
      </div>
      <div class="__desc-title">
        <h1>Keuntungan</h1>
        <textarea class="form-control __textarea" rows="10" disabled><?= $jobs['benefit_job']; ?></textarea>
      </div>
    </div>
  </div>
  <div class="__jobs-company card">
    <h1>Tentang Perusahaan</h1>
    <div class="__jobs-company-card __shadow">
      <img src="<?= base_url('asset/company_img/') . $jobs['logo']; ?>" class="card-img-top" alt="...">
      <div class="__jobs-company-body card-body">
        <h1 class="card-title" style="margin-bottom: 8px;"><?= $jobs['nama_company']; ?> <span><?= number_format((float)$jobs['rating'], 1, '.', ''); ?> <img src="<?= base_url(); ?>asset/icon/rating.svg" alt=""></span></h1>
        <div class="__job-content-detail">
          <div class="__job-content-loc">
            <img src="<?= base_url(); ?>asset/icon/location.svg" alt="" style="width: 20px; height: 20px;">
            <p><?= $jobs['kantor_pusat']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="__jobs-company-desc">
      <p><?= $jobs['deskripsi']; ?>.</p>
      <a href="<?= base_url(); ?>foryou/detail/<?= $jobs['id_company']; ?>" class="__btn-situs-website btn btn-outline-primary">Lihat Detail</a>
    </div>
  </div>
</div>