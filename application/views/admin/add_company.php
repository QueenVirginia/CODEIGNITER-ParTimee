<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Add New Company</h1>

<form class="mb-4 pl-4 col-md-8" method="POST">
    <div class="form-group mt-3">
        <label for="logo">Logo</label>
        <input type="file" name="logo" class="form-control" id="logo" style="height: fit-content;">
        <!-- <div class="form-text text-danger"><?= form_error('logo'); ?></div> -->
    </div>
    <div class="form-group mt-3">
        <label for="nama_company">Company Name</label>
        <input type="text" name="nama_company" class="form-control" id="nama_company">
        <div class="form-text text-danger"><?= form_error('nama_company'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="kantor_pusat">Base Office</label>
        <input type="text" name="kantor_pusat" class="form-control" id="kantor_pusat">
        <div class="form-text text-danger"><?= form_error('kantor_pusat'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="industri">Industry</label>
        <input type="text" name="industri" class="form-control" id="industri">
        <div class="form-text text-danger"><?= form_error('industri'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="situs">Official Website</label>
        <input type="text" name="situs" class="form-control" id="situs">
        <div class="form-text text-danger"><?= form_error('situs'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="no_telepon">Phone_Number</label>
        <input type="text" name="no_telepon" class="form-control" id="no_telepon">
        <div class="form-text text-danger"><?= form_error('no_telepon'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="deskripsi">Description</label>
        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
        <div class="form-text text-danger"><?= form_error('deskripsi'); ?></div>
    </div>
    <button type="submit" name="add_job" class="btn btn-primary float-end">Save Job</button>
</form>