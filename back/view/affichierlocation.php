<?php
require_once '../controller/locationC.php';
require_once "../../db_connnection.php";
require_once "../model/location.php";
$pdo = config::getConnexion();
$locationc = new Locationc();
if (isset($_POST["rech"])) {

    try {
        $query = $pdo->prepare('select * from location where date_debut = " ' . $_POST["rech"] . ' "or date_fin = " ' . $_POST["rech"] . '"');
        $query->execute();
        $listeslocation = $query->fetchALL();
    } catch (Exception $e) {
        die('erreur :' . $e->getMessage());
    }
} else {
    $listeslocation = $locationc->afficherelocation();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo (2).png">
        <link rel="icon" type="image/png" href="./assets/img/logo (2).png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>afficher location</title>
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
                        <form action="./affichierlocation.php" method="POST">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search..." name="rech">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    <a href="./affichierlocation.php">Cancel</a>
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
                                <h4 class="card-title">Gestion Des Locations</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>

                                                <th>Date Debut</th>
                                                <th>Date fin</th>
                                                <th>Numero </th>
                                                <th>Adresse</th>
                                                <th>User</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <?php foreach ($listeslocation as $location) { ?>

                                            <tr>

                                                <td>
                                                    <?php echo $location['date_debut']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $location['date_fin']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $location['numero']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $location['adresse']; ?>
                                                </td>
                                                <td>
                                                    <?php $username = $locationc->getuser($location['iduser']);
                                                    echo $username['username'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="detailslocation.php?idlocation=<?php echo $location['id'] ?>" class="btn btn-dark" role="button" title="details"> Details</a>

                                                </td>
                                                <td>
                                                    <a href="supprimerlocation.php?idlocation=<?php echo $location['id'] ?>" class="btn btn-danger" role="button" title="supprimer"> supprimer</a>

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