<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Admin Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('Assets/') ?>images/favicon.png">

    <link rel="stylesheet" href="<?= base_url('Assets/') ?>vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="<?= base_url('Assets/') ?>vendor/select2/css/select2.min.css">
    <link href="<?= base_url('Assets/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?= base_url('Assets/') ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url('Assets/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="<?= base_url('Assets/') ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="<?= base_url('Assets/') ?>css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
        Header start
        ***********************************-->
        <?= $this->include('Layout/header'); ?>

        <!--**********************************
        Header end 
        ***********************************-->

        <!--**********************************
        Sidebar start
        ***********************************-->
        <?= $this->include('Layout/sidebar'); ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <?php 
                        if($sub_menu == ''):
                        ?>
                        <li class="breadcrumb-item"><a></a><?= $menu; ?></li>
                        <?php else: ?>
                        <li class="breadcrumb-item active"><a href="<?= base_url('Dashboard') ?>"></a><?= $sub_menu; ?>
                        </li>
                        <li class="breadcrumb-item"><a></a><?= $menu; ?></li>
                        <?php endif; ?>
                    </ol>
                </div>

                <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('Assets/') ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('Assets/') ?>vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('Assets/') ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="<?= base_url('Assets/') ?>vendor/apexchart/apexchart.js"></script>

    <!-- Datatable -->
    <script src="<?= base_url('Assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <!-- <script src="<?= base_url('Assets/') ?>js/plugins-init/datatables.init.js"></script> -->

    <?= $this->renderSection('datatables'); ?>

    <script src="<?= base_url('Assets/') ?>vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url('Assets/') ?>vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="<?= base_url('Assets/') ?>js/dashboard/dashboard-1.js"></script>

    <script src="<?= base_url('Assets/') ?>vendor/owl-carousel/owl.carousel.js"></script>

    <script src="<?= base_url('Assets/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('Assets/') ?>js/dlabnav-init.js"></script>
    <script src="<?= base_url('Assets/') ?>js/demo.js"></script>
    <script src="<?= base_url('Assets/') ?>js/styleSwitcher.js"></script>
    <script>
    function cardsCenter() {

        /*  testimonial one function by = owl.carousel.js */



        jQuery('.card-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            //center:true,
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                800: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1600: {
                    items: 1
                }
            }
        })
    }

    jQuery(window).on('load', function() {
        setTimeout(function() {
            cardsCenter();
        }, 1000);
    });
    </script>

</body>

</html>