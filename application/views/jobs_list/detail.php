  <div class="__jobs-back">
    <a href="<?= base_url(); ?>jobslist"><img src="<?= base_url(); ?>asset/icon/back.svg" alt="" style="width: 24px; height: 24px;">Back</a>
  </div>

  <div class="__jobs-description">
    <div class="__jobs-description-card card">
      <div class="__jobs-description-text">
        <img src="<?= base_url(); ?>asset/img/aboutus.jpg" class="__jobs-img card-img-top" alt="...">
        <div class="__jobs-description-header card-body">
          <div class="__jobs-title-company">
            <h1><?= $jobs['nama_job']; ?></h1>
            <p>
              <?= $jobs['nama_company']; ?><span><?= $jobs['rating']; ?><img src="<?= base_url(); ?>asset/icon/rating.svg" alt="" style="width: 20px; height: 20px;"></span>
            </p>
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
            <button type="button" class="__btn-apply btn btn-primary" data-bs-toggle="modal" data-bs-target="#popupApply">Apply Now</button>
            <!-- <button type="button" class="__btn-share btn btn-outline-primary"><img src="<?= base_url(); ?>asset/icon/share.svg" alt="">Share</button> -->
          </div>
        </div>
      </div>
      <hr style="margin-top: 24px; margin-bottom: 24px; border-color: #9A9A9A">
      <div class="__jobs-description-content">
        <div class="__desc-title">
          <h1>Description</h1>
          <p><?= $jobs['deskripsi_job']; ?></p>
        </div>
        <!-- <div class="__desc-title">
          <h1>Qualification</h1>
          <ul>
            <li><?= $jobs['kualifikasi_job']; ?></li>
            <li>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</li>
            <li>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</li>
          </ul>
        </div> -->
        <div class="__desc-title">
          <h1>Benefit</h1>
          <ul>
            <li><?= $jobs['benefit_job']; ?></li>
            <li>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</li>
            <li>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="__jobs-company card">
      <h1>About Company</h1>
      <div class="__jobs-company-card __shadow">
        <img src="<?= base_url(); ?>asset/img/hero.png" class="card-img-top" alt="...">
        <div class="__jobs-company-body card-body">
          <h1 class="card-title" style="margin-bottom: 8px;"><?= $jobs['nama_company']; ?> <span><?= $jobs['rating']; ?> <img src="<?= base_url(); ?>asset/icon/rating.svg" alt=""></span></h1>
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
        <a href="<?= base_url(); ?>foryou/detail/<?= $jobs['id_company']; ?>" class="__btn-situs-website btn btn-outline-primary">View Detail</a>
      </div>
    </div>
  </div>

  <!-- PopUp Apply -->
  <!-- <div class="modal fade" id="popupApply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="__popup-apply modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Send Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">From</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" disabled readonly>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">To</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="<?= $jobs['email_company']; ?>" disabled readonly>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subject</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Attach File</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" disabled readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div> -->