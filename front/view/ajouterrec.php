<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
include_once '../model/reclamation.php';
include_once '../model/reclamation.php';
include '../controller/reclamationC.php';



$error = "";

// create adherent
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
if (
    //isset($_POST["id_reclamation"]) &&
    isset($_POST["type_reclamation"])    &&
    isset($_POST["message"])

) {
    if (
        // !empty($_POST["id_reclamation"]) && 
        !empty($_POST["type_reclamation"]) &&
        !empty($_POST["message"])
    ) {
        $reclamation = new reclamation(
            //$_POST['id_reclamation'],
            $_POST['type_reclamation'],
            $_POST['message'],
        );
        $reclamationC->ajouterrec($reclamation);
        header('Location:afficherrec.php');
    } else
        $error = "Missing information";
}



?>
<!doctype html>
<html class="no-js" lang="zxx">

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

<body>
    <!--? Preloader Start -->

    <!-- Preloader Start -->

    <div>


        <?php require_once('header.php'); ?>
        <br><br><br><br>




        <hr>

        <div id="error">

            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
            <table class="table" border="1" align="center">

                <!-- 
           <tr> <td>  <label>id_reclamation</label>  </td> 
                   <td> <input type="int" name="id_reclamation" id="id_reclamation" > </td> </tr> -->

                <tr>
                    <td> <label>type_reclamation </label> </td>
                    <td> <input type="varchar" name="type_reclamation" id="type_reclamation" maxlength="100"> </td>
                </tr>

                <tr>
                    <td> <label>message </label> </td>

                    <td> <input type="varchar" name="message" id="message" maxlength="100"> </td>
                </tr>

                <tr>
                    <td> <input type="submit" name="submit" value="submit" class="btn btn-primary"></td>
                </tr>
            </table>
            <button type="button" class="btn btn-info"><a href="afficherrec.php">Retour à la liste</a></button>

        </form>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br>
        <br><br><br><br><br>
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
        <!--? Search model Begin -->
        <div class="search-model-box">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-btn">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Searching key.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- JS here -->

        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
        <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                demo.initDashboardPageCharts();
            });
        </script>


</body>

</html>