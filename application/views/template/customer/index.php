<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/customer/images/others/favicon-warma.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/customer/images/others/favicon-warma.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/customer/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/customer/css/plugins.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/customer/style.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/customer/css/custom.css">

    <!-- Snap Midtrans -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-r3Il2sHQSHWzr--h"></script>
</head>

<body>
    <div id="wrapper" class="wrapper">
        <header class="header">
            <!-- Header -->
            <?= $header; ?>

            <!-- Menu -->
            <?= $menu; ?>
        </header>

        <!-- Content -->
        <?= $content; ?>

        <!-- Footer -->
        <?= $footer; ?>

    </div>

    <!-- Js Files -->
    <script src="<?= base_url(); ?>assets/customer/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/main.js"></script>

    <!-- sweet alert Js -->
    <script src="<?= base_url(); ?>assets/customer/js/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/customer/js/ac-alert.js"></script>

    <!-- Snap Token -->
    <script type="text/javascript">
        var payButton = document.getElementById('payment');
        payButton.addEventListener('click', function() {
            snap.pay('<?= $snaptoken ?>');
        });
    </script>

</body>

</html>