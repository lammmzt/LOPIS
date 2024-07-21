<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Admin Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('Assets/') ?>images/favicon.png">
    <link href="<?= base_url('Assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('Assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Login</h4>
                                    <form id="form_login">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="Masukan Username"
                                                name="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Masukan pass"
                                                name="password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" id="btn_login">Sign
                                                Me In</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign
                                                up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('Assets/') ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('Assets/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('Assets/') ?>js/dlabnav-init.js"></script>
    <script src="<?= base_url('Assets/') ?>js/styleSwitcher.js"></script>
    <script src="<?= base_url('Assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('Assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('Assets/') ?>js/plugins-init/sweetalert.init.js"></script>

    <script tyye="text/javascript">
    function getSwal(status, message) {
        if (status == '200') {
            swal(message, "Anda akan diarahkan ke halaman dashboard", "success");
        } else {
            swal("error", message, "error");
        }
    }
    $(document).ready(function() {
        $('#form_login').submit(function(e) {
            e.preventDefault();
            $('#btn_login').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $.ajax({
                url: '<?= base_url('Auth/login') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.error) {
                        // alert(data.message);
                        getSwal(data.status, data.message);
                        $('#btn_login').html('Sign Me In');
                    } else {
                        getSwal(data.status, data.message);
                        // set time out 
                        setTimeout(function() {
                            $('#btn_login').html('Sign Me In');
                            window.location.href =
                                '<?= base_url('Dashboard') ?>';
                        }, 2000);
                    }
                }
            });
        });
    });
    </script>
</body>

</html>