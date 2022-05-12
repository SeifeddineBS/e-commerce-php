<?php

include_once '../controller/reponseC.php';
include_once '../model/reponse.php';


use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';



$a = $_GET['id'];

// if (isset($_POST['contenu'] )  &&  isset($_POST["feedback"] )) 
// {   

//          $reponse = new reponse(NULL, $a, $_POST['contenu'], $_POST['feedback']);
//         $reponseC = new reponseC();
//         $reponseC->ajouterreponse($reponse);
//         header('Location:afficherrep.php');
//         $mail = new PHPMailer;

//         $mail->SMTPDebug = 3;                               // Enable verbose debug output

//         $mail->isSMTP();                                      // Set mailer to use SMTP
//         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//         $mail->SMTPAuth = true;                               // Enable SMTP authentication
//         $mail->Username = 'slimscholescs@gmail.com';                 // SMTP username
//         $mail->Password = '100slimbouchibacs1.6';                           // SMTP password
//         //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//         $mail->Port = 587;                                    // TCP port to connect to

//         $mail->From='slimscholescs@gmail.com';
//         $mail->FromName="slimscholescs";
//         $mail->addAddress('slimscholescs@gmail.com', 'slimscholescs');     // Add a recipient
//         $mail->isHTML(true);                                  // Set email format to HTML

//         $mail->Subject = 'verification';
//         $mail->Body    = 'verifier reservation, nombre de personne :</b> veuillez attendre un autre email de confirmation et un voucher ';
//         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//         mail("slimscholescs@gmail.com","test","confirmation","slimscholescs@gmail.com");
//         if(!$mail->send()) {
//             echo 'Message could not be sent.';
//             echo 'Mailer Error: ' . $mail->ErrorInfo;
//         } else {
//             echo 'Message has been sent';
//         }
// }
if (isset($_POST['contenu'])  &&  isset($_POST["feedback"])) {

    $reponse = new reponse(
        NULL,
        $a,
        $_POST['contenu'],
        $_POST['feedback']
    );
    $reponseC = new reponseC();
    $reponseC->ajouterreponse($reponse);
    header('Location:afficherrep.php');

    $mail = new PHPMailer;

    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'slimscholescs@gmail.com';                 // SMTP username
    $mail->Password = '100slimbouchibacs1.6';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->From = 'slimscholescs@gmail.com';
    $mail->FromName = "slimscholescs";
    $mail->addAddress('slimscholescs@gmail.com', 'slimscholescs');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'verification';
    $mail->Body    = 'on a pris en considération votre reclamation :</b> veuillez consulter notre reponse s ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    mail("slimscholescs@gmail.com", "test", "confirmation", "slimscholescs@gmail.com");
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}


?>




<!DOCTYPE html>
<html lang="en">

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

<body class="">
    <div class="wrapper ">
        <?php require_once('header.php'); ?>

        <div class="main-panel">



            <br><br><br><br>

            <form action="" method="POST">
                <table class="table" border="1" align="center">


                    <tr>
                        <td> <label>contenu </label> </td>
                        <td> <input type="text" name="contenu" id="contenu" maxlength="100"> </td>
                    </tr>

                    <tr>
                        <td> <label>feedback </label> </td>

                        <td> <input type="text" name="feedback" id="feedback" maxlength="100"> </td>
                    </tr>

                    <tr>
                        <td> <input class="btn btn-primary" type="submit" name="submit" value="submit"></td>
                    </tr>
                </table>
            </form>
            <button type="button" class="btn btn-info"><a href="../front/afficherrec.php">Retour à la liste</a></button>


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
        </div>
    </div>
</body>
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

</html>