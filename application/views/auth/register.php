<div class="__container-log-reg">
    <div class="__header-log">
        <h1>Welcome To <span>ParTimee</span></h1>
        <p>Online platform to offer you part time jobs</p>
    </div>

    <form action="<?= base_url('auth/registration') ?>" method="POST">
        <div class="__login-form">
            <div class="__boxes">
                <div class="mb-0 __input-group __login-form-input input-group">
                    <span class="__input-group-text input-group-text"><img src="<?php echo base_url(); ?>asset/icon/user.svg" class="input-group-text" alt=""></span>
                    <input type="text" class="__input-form form-control" placeholder="Full Name" aria-label="nama" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                </div>
                <small><?= form_error('nama'); ?></small>
            </div>

            <div class="__boxes">
                <div class="mb-0 __input-group __login-form-input input-group">
                    <span class="__input-group-text input-group-text"><img src="<?php echo base_url(); ?>asset/icon/email.svg" class="input-group-text" alt=""></span>
                    <input type="text" class="__input-form form-control" placeholder="E-mail Address" aria-label="email" name="email" id="email" value="<?= set_value('email'); ?>">
                </div>
                <small><?= form_error('email'); ?></small>
            </div>

            <div class="__boxes">
                <div class="__input-group input-group">
                    <span class="__input-group-text input-group-text"><img src="<?php echo base_url(); ?>asset/icon/password.svg" class="input-group-text" alt=""></span>
                    <input type="password" class="__input-form form-control" placeholder="Password" aria-label="password1" name="password1" id="password1">
                </div>
                <small><?= form_error('password1'); ?></small>
            </div>

            <div class="__input-group input-group">
                <span class="__input-group-text input-group-text"></span>
                <input type="password" class="__input-form form-control" placeholder="Repeat Password" aria-label="password2" name="password2" id="password2" style="padding-top: 16px; padding-bottom: 14px">
            </div>

            <button type="submit" class="__btn-regis btn btn-primary w-100">Register Account</button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="">Forgot Password?</a>
    </div>

    <div class="mt-2 text-center">
        <a href="<?php echo base_url(); ?>auth">Already have an Account? Login!</a>
    </div>
</div>