<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Detail Job</h1>

<div class="row mt-3 pl-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Job Name</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['nama_job']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Location</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['lokasi']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Status</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['batasan']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Job Type</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['tipe_kerja']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Description</h6>
                    <h5 class="mb-0 card-title text-primary"><textarea class="form-control text-primary" rows="5" disabled><?= $jobs['deskripsi_job']; ?></textarea></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Benefit</h6>
                    <h5 class="mb-0 card-title text-primary"><textarea class="form-control text-primary"  rows="5" disabled><?= $jobs['benefit_job']; ?></textarea></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Apply Link</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['link_apply']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Company</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $jobs['id_company']; ?></h5>
                </li>
            </ul>
        </div>
    </div>
</div>