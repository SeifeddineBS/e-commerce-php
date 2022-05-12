<?php
include '../controller/reclamationC.php';
$reclamationC = new reclamationC();
$liste = $reclamationC->afficherTrier();

if (isset($_POST["type_reclamation"])) {
    $liste = $reclamationC->recherchereclamation($_POST["type_reclamation"], $_POST["message"]);
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
            <!-- Navbar -->



            <center>
                <h1>Liste des reclamations triées</h1>
            </center>



            <table border="1" align="center">
                <tr>
                    <th>id_reclamation</th>
                    <th>type_reclamation</th>
                    <th>message</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    <th>Reponse</th>

                </tr>
                <?php
                foreach ($liste as $reclamation) {
                ?>
                    <tr>
                        <td><?php echo $reclamation['id_reclamation']; ?></td>
                        <td><?php echo $reclamation['type_reclamation']; ?></td>
                        <td><?php echo $reclamation['message']; ?></td>


                        <td>
                            <a href="modifierrec.php?id=<?php echo $reclamation['id_reclamation']; ?>" type="submit" class="btn btn-primary">Modifier</a>
                        </td>
                        <td>
                            <a href="supprimerrec.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?> " onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette Reclamation?'));" type="button" class="btn btn-warning">Supprimer</a>
                        </td>
                        <td>
                            <a href="ajouterrep.php?id=<?php echo $reclamation['id_reclamation']; ?>" type="button" class="btn btn-success">Reponse</a>
                        </td>
                    </tr>
                <?php
                }
                ?>




            </table>

            <center>
                <button type="button" class="btn btn-primary"><a href="ajouterrec.php">Ajouter une reclamation</a></button>

            </center>


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