<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Profil User</h1>

<div class="row mt-3 pl-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Foto Profil</h6>
                    <h5 class="mb-0 card-title text-primary">
                        <img src="<?= base_url('asset/profile_img/') . $user_data['foto']; ?>" alt="" width="200px" height="200px">
                    </h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Nama User</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user_data['nama']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Email</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user_data['email']; ?></h5>
                </li>
                <li class="list-group-item">
                    <h6 class="card-subtitle mt-2 mb-2 text-dark">Password</h6>
                    <h5 class="mb-0 card-title text-primary"><?= $user_data['password']; ?></h5>
                </li>
            </ul>
        </div>
    </div>
</div>