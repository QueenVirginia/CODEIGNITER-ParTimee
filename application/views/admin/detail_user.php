<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Detail User</h1>

<div class="row mt-3 pl-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Company Logo</h6>
                    <h5 class="mb-0 card-title text-primary">
                        <img src="<?= base_url(); ?>asset/img/background.jpg" alt="" width="200px" height="200px">
                    </h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">User Name</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['nama']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Email</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['email']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Phone Number</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['no_telepon']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Facebook</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['facebook']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Instagram</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['instagram']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">LinkedIn</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['linkedin']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">CV</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user['cv']; ?></h5>
                </li>
            </ul>
        </div>
    </div>
</div>