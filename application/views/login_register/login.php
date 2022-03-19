<div class="__container-log-reg">
    <div class="__header-log">
        <h1>Welcome To <span>ParTimee</span></h1>
        <p>Online platform to offer you part time jobs</p>
    </div>

    <div class="__login-form">
        <div class="__input-group __login-form-input input-group">
            <span class="__input-group-text input-group-text"><img src="asset/icon/email.svg" class="input-group-text" alt=""></span>
            <input type="text" class="__input-form form-control" placeholder="Enter your email..." aria-label="email" name="email" id="email">
        </div>
        <div class="__input-group input-group">
            <span class="__input-group-text input-group-text"><img src="asset/icon/password.svg" class="input-group-text" alt=""></span>
            <input type="text" class="__input-form form-control" placeholder="Password" aria-label="password" name="password" id="password">
        </div>
        <a href="<?= base_url() ?>jobslist" class="__btn-login btn btn-primary w-100">Login</a>
    </div>

    <div class="__login-form-detail">
        <a href="">Forgot Password?</a>
        <a href="<?= base_url() ?>register">Create an Account!</a>
    </div>
</div>