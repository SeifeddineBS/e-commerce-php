<?php

include '../Controller/UserController.php';
$userC = new UserContoller();

$error = "";
$user = null;
if (

    isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"])

) {
    if (

        !empty($_POST['username']) &&
        !empty($_POST["password"]) &&
        !empty($_POST["email"])
        // !empty($_POST["CategorieId"])
    ) {
        $user = new User(

            $_POST['username'],
            $_POST['email'],
            $_POST["password"],

        );
        $userC->modifierUtilisateur($user, $_GET["id"]);
    } else
        $error = "Missing information";
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/flaticon.css">
    <link rel="stylesheet" href="./assets/css/slicknav.css">
    <link rel="stylesheet" href="./assets/css/animate.min.css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/slick.css">
    <link rel="stylesheet" href="./assets/css/nice-select.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<!--end navbar-->
<?php require_once('header.php'); ?>

<!--end breadcrumb-->
</div>
<!--end container-->
</div>
<!--============ End Main Navigation ================================================================-->
<!--============ Hero Form ==========================================================================-->

<!--end collapse-->
<!--============ End Hero Form ======================================================================-->
<!--============ Page Title =========================================================================-->
<div class="page-title">
    <div class="container">
        <center>
            <h1>My Profile</h1>

        </center>
    </div>
    <!--end container-->
</div>
<br><br><br><br>

<!--============ End Page Title =====================================================================-->
<div class="background"></div>
<!--end background-->
</div>
<!--end hero-wrapper-->
<!--end hero-->

<!--*********************************************************************************************************-->
<!--************ CONTENT ************************************************************************************-->
<!--*********************************************************************************************************-->

<section class="content">
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <!--end col-md-3-->
                <div class="col-md-9">

                    <form class="form" mathod="POST">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>Personal Information</h2>
                                <section>

                                    <div class="row">
                                        <div class="col-md-4">

                                            <!--end form-group-->
                                        </div>
                                        <label for="id">
                                        </label>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label required">Your Name</label>
                                                <input name="username" type="text" class="form-control" id="name" placeholder="Your Name" value="<?php echo $_GET['username'] ?>" required>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-md-8-->
                                    </div>
                                    <!--end row-->

                                    <!--end form-group-->

                                    <!--end form-group-->
                                </section>

                                <section>
                                    <h2>Contact</h2>

                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" value="<?php echo $_GET['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label required">Your Password</label>
                                        <input name="password" type="text" class="form-control" id="name" placeholder="Your Name" value="<?php echo $_GET['password'] ?>" required>
                                    </div>
                                    <!--end form-group-->
                                </section>



                            </div>
                            <!--end col-md-8-->

                            <!--end col-md-3-->
                        </div>

                    </form>
                </div>
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

<br><br><br><br>

<footer class="footer">
    <div class="container-fluid">
        <nav>
            <ul>
                <li>
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
    </div>
</footer>
<!--end footer-->
</div>
<!--end page-->


</body>

</html>