<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/admin/images/logo/warma-icon.png" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/style.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/plugins/dataTables.bootstrap4.min.css">

</head>

<body class="background-blue">
    <!-- [ Pre-loader ]  -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!--  menu   -->
    <?= $menu; ?>

    <!-- Header -->
    <?= $header; ?>

    <!-- Main Content -->
    <?= $content; ?>

    <!-- Required Js -->
    <script src="<?= base_url(); ?>assets/admin/js/vendor-all.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/ripple.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/pcoded.min.js"></script>

    <!-- sweet alert Js -->
    <script src="<?= base_url(); ?>assets/admin/js/plugins/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/pages/ac-alert.js"></script>

    <!-- Datatable -->
    <script src="<?= base_url(); ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/pages/data-basic-custom.js"></script>

    <!-- Script datatable -->
    <script>
        $('#report-table').DataTable();
    </script>

    <!-- Script custom file input -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

    <!-- Script preview image -->
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            var imageField = document.getElementById("image-field")

            reader.onload = function() {
                if (reader.readyState == 2) {
                    imageField.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>