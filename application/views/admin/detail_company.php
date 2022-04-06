<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Detail Company</h1>

<div class="row mt-3 pl-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Company Logo</h6>
                    <h5 class="mb-0 card-title text-primary">
                        <img src="<?= base_url('asset/company_img/') . $company['logo']; ?>" width="200px" height="200px">
                    </h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Company Name</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['nama_company']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Base Office</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['kantor_pusat']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Rating</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['rating']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Industry</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['industri']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Official Website</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['situs']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Phone Number</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $company['no_telepon']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Description</h6>
                    <h5 class="mb-0 card-title text-primary"><textarea class="form-control text-primary" rows="5" disabled><?= $company['deskripsi']; ?></textarea></h5>
                </li>
            </ul>
        </div>
    </div>
</div>