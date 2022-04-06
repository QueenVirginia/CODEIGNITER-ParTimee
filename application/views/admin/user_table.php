<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage User</h1>


    <!-- Topbar Search -->
    <form method="POST" class="d-none d-sm-inline-block form-inline mb-md-4 mx-auto col-6 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-white border-0 small" placeholder="Search By User ID, Name, Email, Phone Number..." name="cari_user">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Pop Up Message -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            User <?= $this->session->flashdata('flash'); ?> <strong>Succesfully</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>CV</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($user_data)) : ?>
                            <div class="__empty-state mb-4 text-center">
                                <h1>Sorry</h1>
                                <p class="text-muted">We can't find the jobs your looking for,</p>
                                <a href="<?= base_url(); ?>admin/user_list" class="__btn-back-to-jobs btn btn-primary">Go Back</a>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($user_data as $u) : ?>
                            <tr>
                                <td><?= $u['id_user']; ?></td>
                                <td><img src="<?= base_url('asset/profile_img/') . $u['foto']; ?>" width="60px" height="60px"></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <!-- <td><?= $u['cv']; ?></td> -->
                                <td>
                                    <a href="<?= base_url(); ?>admin/detail_user/<?= $u['id_user']; ?>" class="btn btn-primary">Detail</a>
                                    <a href="<?= base_url(); ?>admin/delete_user/<?= $u['id_user']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->