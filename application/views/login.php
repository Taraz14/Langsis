<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url() ?>public/admin/img/logo/smk.png" rel="icon">
    <title>Langsis - Login</title>
    <link href="<?= base_url() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>public/admin/css/ruang-admin.min.css" rel="stylesheet">
    <style>
        .login-img {
            background: url("public/admin/img/login/mental.jpg") repeat fixed center;
        }
    </style>
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-4" style="background-color: #6777EF;">
                                <div class="login-img">

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="login-form">
                                    <div class="text-center">
                                        <div class="sidebar-brand-icon">
                                            <img src="<?= base_url() ?>/public/admin/img/logo/smk.png" style="max-width: 30%;">
                                        </div>
                                        <h1 class="h4 text-gray-900 mb-4">Selamat datang di <strong>Langsis SMK</strong></h1>
                                    </div>
                                    <?= $this->session->flashdata('failed') ?>
                                    <form class="user" method="post" action="<?= site_url('authController/login') ?>">
                                        <div class="input-group form-group">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo get_cookie('loginId'); ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" value="<?php echo get_cookie('loginPass'); ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" <?php echo get_cookie('remember') ? 'checked="checked"' : ''; ?>>
                                                <label class="custom-control-label" for="remember">Ingat saya</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <!-- <a href="<?= site_url('login'); ?>" class="btn btn-primary btn-block">Masuk</a> -->
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url() ?>public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- <script src="<?= base_url() ?>public/admin/js/ruang-admin.min.js"></script> -->
</body>

</html>