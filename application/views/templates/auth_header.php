<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/styles.css">

    <title>ParTimee</title>

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: url('<?php echo base_url(); ?>asset/img/background.jpg');
            background-repeat: no-repeat;
            height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFFFF;">
        <div class="__navbar-nav navbar-nav container-fluid">
            <a class="__navbar-logo navbar-brand" href="<?= base_url() ?>auth">PartTimee</a>
            <div class="collapse navbar-collapse float-end" id="navbarNavAltMarkup" style="justify-content: end;">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>auth">Login</a>
                    <a class="nav-link" href="<?= base_url() ?>auth/registration">Register</a>
                </div>
            </div>
        </div>
    </nav>