<?php
require_once '../controller/evenementc.php';
require_once '../controller/participationc.php';

$evenetC = new Evenementc();
$liste = $evenetC->afficherevenement();
if (isset($_POST["Titre"])) {
    $liste = $evenetC->Find($_POST["Titre"], $_POST["Lieu"]);
}


$participationc = new Participationc();
$listeParticipations = $participationc->afficherParticipations();

?>
<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo (2).png">
        <link rel="icon" type="image/png" href="./assets/img/logo (2).png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>afficher evenement</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="./assets/demo/demo.css" rel="stylesheet" />
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

        <!-- Bootstrap Css -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body class="">
    <div class="wrapper ">
        <?php require_once('navbar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Table List</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Gestion Des Evenement</h4>
                            </div>

                            <a href="ajouterevenement.php" class="btn btn-primary">Ajouter Evenement</a>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>

                                                <th>Titre de l'evenement</th>
                                                <th style="width: 100px">Description</th>
                                                <th>Type</th>
                                                <th>Lieu</th>
                                                <th style="width: 100px">Date</th>
                                                <th style="width: 100px">Participant</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>

                                        <a href="affichertrier.php">afficher la liste trié</a>
                                        <th>
                                            <form action="" method="POST">
                                                <input type="text" name="Titre">
                                                <input type="text" name="Lieu">
                                                <input type="submit" name="recherche" value="Recherche" />
                                            </form>
                                            <?php foreach ($liste as $event) { ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $event['titre']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $event['description']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $event['type']; ?>
                                                    </td>


                                                    <td>
                                                        <?php echo $event['lieu']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $event['date']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $event['nbparticipant']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo "<img src='../images/" . $event['image'] . " '  height=50 width=50>";
                                                        ?>



                                                    </td>
                                                    <td>
                                                        <a href=" detailevenement.php?event=<?php echo $event['idevent']; ?>" class="btn btn-dark">Details</a>

                                                    </td>
                                                    <td>
                                                        <a href="modifierevenement.php?modifier=<?php echo $event['idevent']; ?>" class="btn btn-warning">modifier</a>

                                                    </td>
                                                    <td>
                                                        <a href="supprimerevenement.php?supprimer=<?php echo $event['idevent']; ?>" class="btn btn-danger" role="button" title="supprimer"> supprimer</a>

                                                    </td>

                                                </tr>
                                            <?php } ?>

                                    </table>
                                </div>
                            </div>


                            <!-- start affichage participations -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>

                                                <th>idparticipation</th>
                                                <th style="width: 100px">idevent</th>
                                                <th>iduser</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($listeParticipations as $event) { ?>

                                            <tr>
                                                <td>
                                                    <?php echo $event['idparticipation']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $event['idevent']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $event['iduser']; ?>
                                                </td>





                                                <td>
                                                    <a href="detailevenement.php?event=<?php echo $event['idevent']; ?>" class="btn btn-dark">Details</a>

                                                </td>
                                                <td>
                                                    <a href="modifierevenement.php?modifier=<?php echo $event['idevent']; ?>" class="btn btn-warning">modifier</a>

                                                </td>
                                                <td>
                                                    <a href="supprimerevenement.php?supprimer=<?php echo $event['idevent']; ?>" class="btn btn-danger" role="button" title="supprimer"> supprimer</a>

                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">

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

</html>