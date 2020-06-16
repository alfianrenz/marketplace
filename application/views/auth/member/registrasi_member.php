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
                            <a href="<?= site_url('home'); ?>" class="fxt-logo"><img src="<?= base_url(); ?>assets/auth/img/logo/logo-warma-blue.png" alt="Logo"></a>
                            <div class="fxt-page-switcher">
                                <a href="<?= site_url('auth/login_member'); ?>" class="switcher-text1">Masuk</a>
                                <a href="<?= site_url('auth/registrasi_member'); ?>" class="switcher-text1 active">Daftar</a>
                            </div>
                        </div>

                        <div class="fxt-form">
                            <h2 class="mb-2">Daftar</h2>
                            <p>Daftar dan mulai berbelanja</p>

                            <?= $this->session->userdata('message'); ?>
                            <form method="POST" action="<?= site_url('auth/registrasi_member'); ?>">
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                    </div>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                    </div>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" class="form-control" id="handphone" name="handphone" placeholder="No Handphone" value="<?= set_value('handphone'); ?>">
                                    </div>
                                    <?= form_error('handphone', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        <div class="fxt-content-between">
                                            <button type="submit" class="fxt-btn-fill">Daftar</button>
                                            <!-- <a href="<?= site_url('auth/login_seller'); ?>" class="switcher-text2">Kembali ke Login</a> -->
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