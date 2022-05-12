<?php

include '../Controller/UserController.php';
$userC = new UserContoller();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $userC->login($myusername, $mypassword);
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trotti | OrderNow</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo (2).png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="page sub-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header class="hero">
            <div class="hero-wrapper">
                <!--============ Secondary Navigation ===============================================================-->
                <?php require_once('header.php'); ?>

                <!--============ End Secondary Navigation ===========================================================-->

                <!--============ End Main Navigation ================================================================-->
                <!--============ Hero Form ==========================================================================-->


                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Sign In</h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
            </section>
            <!--end hero-->

            <!--*********************************************************************************************************-->
            <!--************ CONTENT ************************************************************************************-->
            <!--*********************************************************************************************************-->
            <section class="content">
                <section class="block">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <form class="form clearfix" action="" method="POST">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label required">Username</label>
                                        <input name="username" type="text" class="form-control" id="username" placeholder="Your username" required>
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="password" class="col-form-label required">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    <!--end form-group-->
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <label>
                                            <input type="checkbox" name="remember" value="1">
                                            Remember Me
                                        </label>

                                        <input type="submit" class="btn btn-primary" value="Sign In"></button>
                                    </div>
                                </form>
                                <hr>
                                <p>
                                    Troubles with signing? <a href="#" class="link">Click here.</a>
                                </p>
                            </div>
                            <!--end col-md-6-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end container-->
                </section>
                <!--end block-->
            </section>
            <!--end content-->

            <!--*********************************************************************************************************-->
            <!--************ FOOTER *************************************************************************************-->
            <!--*********************************************************************************************************-->

    </div>


</body>

</html>
<script src="front/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="front/assets/js/popper.min.js"></script>
<script type="text/javascript" src="front/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
<script src="front/assets/js/selectize.min.js"></script>
<script src="front/assets/js/masonry.pkgd.min.js"></script>
<script src="front/assets/js/icheck.min.js"></script>
<script src="front/assets/js/jquery.validate.min.js"></script>
<script src="front/assets/js/custom.js"></script>