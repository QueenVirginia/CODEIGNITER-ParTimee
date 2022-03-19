<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Jobs</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <div class="d-flex justify-content-end">
        <!-- Add Jobs -->
        <div class="col-md-6 mb-4 mr-auto">
            <a href="<?= base_url(); ?>admin/add_job/" class="btn btn-primary btn-lg"><i class="fas fa-plus fa-sm"></i> Add New Job</a>
        </div>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Pop Up Message -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Jobs <?= $this->session->flashdata('flash'); ?> <strong>Succesfully</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Job Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Job Type</th>
                            <th>Apply Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Job ID</th>
                            <th>Job Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Job Type</th>
                            <th>Apply Link</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($jobs as $j) : ?>
                            <tr>
                                <td><?= $j['id_job']; ?></td>
                                <td><?= $j['nama_job']; ?></td>
                                <td><?= $j['lokasi']; ?></td>
                                <td><?= $j['batasan']; ?></td>
                                <td><?= $j['tipe_kerja']; ?></td>
                                <td><?= $j['link_apply']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/detail_job/<?= $j['id_job']; ?>" class="btn btn-primary">Detail</a>
                                    <a href="<?= base_url(); ?>admin/edit_job/<?= $j['id_job']; ?>" class="btn btn-success">Edit</a>
                                    <a href="<?= base_url(); ?>admin/delete_job/<?= $j['id_job']; ?>" class="btn btn-danger">Delete</a>
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