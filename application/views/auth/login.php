<div class="__container-log-reg">
    <div class="__header-log">
        <h1>Welcome To <span>ParTimee</span></h1>
        <p>Online platform to offer you part time jobs</p>
    </div>

    <?= $this->session->flashdata('msg') ?>

    <form action="<?= base_url('auth') ?>" method="POST">
        <div class="__login-form">
            <div class="__boxes">
                <div class="mb-0 __input-group __login-form-input input-group">
                    <span class="__input-group-text input-group-text"><img src="asset/icon/email.svg" class="input-group-text" alt=""></span>
                    <input type="text" class="__input-form form-control" placeholder="Masukkan Alamat Email..." aria-label="email" name="email" id="email" value="<?= set_value('email'); ?>">
                </div>
                <small><?= form_error('email'); ?></small>
            </div>

            <div class="__boxes">
                <div class="__input-group input-group">
                    <span class="__input-group-text input-group-text"><img src="asset/icon/password.svg" class="input-group-text" alt=""></span>
                    <input type="password" class="__input-form form-control" placeholder="Password" aria-label="password" name="password" id="password">
                </div>
                <small><?= form_error('password'); ?></small>
            </div>
            <button type=" submit" class="__btn-login btn btn-primary w-100">Login</button>
        </div>
    </form>

    <!-- <div class="mt-4 text-center">
        <a href="">Forgot Password?</a>
    </div> -->

    <div class="mt-2 text-center">
        <a href="<?= base_url() ?>auth/registration">Buat akun disini!!</a>
    </div>
</div>