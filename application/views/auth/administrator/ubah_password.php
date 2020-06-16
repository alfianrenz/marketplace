<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/auth/img/logo/favicon-warma.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/auth/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/auth/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/auth/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/auth/style.css">
</head>

<body>
    <section class="fxt-template-animation fxt-template-layout1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="" class="fxt-logo"><img src="<?= base_url(); ?>assets/auth/img/logo/logo-warma-blue.png" alt="Logo"></a>
                            <div class="fxt-page-switcher">
                                <!-- <a href="login-1.html" class="switcher-text1 active">Login</a> -->
                                <!-- <a href="register-1.html" class="switcher-text1">Daftar</a> -->
                            </div>
                        </div>

                        <div class="fxt-form">
                            <h2 class="mb-2">Ubah Password</h2>
                            <p>Masukkan password baru anda</p>

                            <?= $this->session->userdata('message'); ?>
                            <form method="POST" action="<?= site_url('auth/ubah_password_admin'); ?>">
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password Baru" value="<?= set_value('password1'); ?>">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                                        <i class="flaticon-padlock"></i>
                                    </div>
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <div class="fxt-content-between">
                                            <button type="submit" class="fxt-btn-fill">Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-none-767 fxt-bg-img" data-bg-image="<?= base_url(); ?>assets/auth/img/figure/bg-login.png"></div>
            </div>
        </div>
    </section>

    <!-- jquery-->
    <script src="<?= base_url(); ?>assets/auth/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url(); ?>assets/auth/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url(); ?>assets/auth/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?= base_url(); ?>assets/auth/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?= base_url(); ?>assets/auth/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url(); ?>assets/auth/js/main.js"></script>

</body>

</html>