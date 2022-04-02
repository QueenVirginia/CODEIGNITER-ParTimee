<!-- Page Heading -->
<h1 class="h3 mb-4 pl-4 text-gray-800">Edit Company</h1>

<div class="mb-4 pl-4 col-md-8">
    <?= form_open_multipart('admin/edit_company') ?>
    <input type="hidden" name="id" value="<?= $company['id_company'] ?>">
    <img src="<?= base_url('asset/company_img/') . $company['logo']; ?>" class="img-thumbnail">
    <!-- <div class="input-group mb-3 mt-3">
        <input type="file" class="form-control" id="logo" name="logo" style="height: fit-content;">
    </div> -->
    <div class="form-group mt-3">
        <label for="nama_company">Company Name</label>
        <input type="text" name="nama_company" class="form-control" id="nama_company" value="<?= $company['nama_company'] ?>">
        <div class="form-text text-danger"><?= form_error('nama_company'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="kantor_pusat">Base Office</label>
        <input type="text" name="kantor_pusat" class="form-control" id="kantor_pusat" value="<?= $company['kantor_pusat'] ?>">
        <div class="form-text text-danger"><?= form_error('kantor_pusat'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="rating">Rating</label>
        <input type="text" name="rating" class="form-control" id="rating" value="<?= $company['rating'] ?>" disabled>
    </div>
    <div class="form-group mt-3">
        <label for="industri">Industry</label>
        <input type="text" name="industri" class="form-control" id="industri" value="<?= $company['industri'] ?>">
        <div class="form-text text-danger"><?= form_error('industri'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="situs">Official Website</label>
        <input type="text" name="situs" class="form-control" id="situs" value="<?= $company['situs'] ?>">
        <div class="form-text text-danger"><?= form_error('situs'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="no_telepon">Phone_Number</label>
        <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?= $company['no_telepon'] ?>">
        <div class="form-text text-danger"><?= form_error('no_telepon'); ?></div>
    </div>
    <div class="form-group mt-3">
        <label for="deskripsi">Description</label>
        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"><?= $company['deskripsi'] ?></textarea>
        <div class="form-text text-danger"><?= form_error('deskripsi'); ?></div>
    </div>
    <button type="submit" name="edit_company" class="btn btn-primary float-end">Save Job</button>
    </form>
</div>