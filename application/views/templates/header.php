<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/css/styles.css">

    <title>ParTimee</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFFFF;">
        <div class="__navbar-nav navbar-nav container-fluid">
            <a class="__navbar-logo navbar-brand" href="<?= base_url() ?>">PartTimee</a>
            <div class="collapse navbar-collapse float-end" id="navbarNavAltMarkup" style="justify-content: center;">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>jobslist">Jobs</a>
                    <a class="nav-link" href="<?= base_url() ?>foryou">Company</a>
                    <a class="nav-link" href="<?= base_url() ?>aboutus">About Us</a>
                </div>
            </div>
            <div class="dropdown">
                <img src="<?= base_url('asset/profile_img/') . $user['foto']; ?>" class="dropdown-toggle" type="button" id="profile-pic" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px; border-radius: 50%;">
                <ul class="dropdown-menu" aria-labelledby="profile-pic" style="margin-left: -100px;">
                    <li><a class="dropdown-item" href="<?= base_url() ?>profile">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url() ?>auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="__hero">
        <div class="__hero-image-card card">
            <img src="<?= base_url(); ?>asset/img/hero.png" class="__hero-image card-img-top">
            <div class="__hero-image-text">
                <div class="__hero-image-text-bg"></div>
                <h1 class="__hero-image-header">Find Your Part Time Job Now! With <span>ParTimee</span></h1>
            </div>
        </div>
    </div>