<?php
require_once '../controller/trotinetteC.php';

$trottic = new trotinettec();
$listTrotinette = $trottic->afficherTrotinette();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo (2).png">
    <link rel="icon" type="image/png" href="./assets/img/logo (2).png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now UI Dashboard by Creative Tim</title>
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

                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>


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
                                <h4 class="card-title"> Nos trotinettes</h4>
                                <div class="col-md-6">

                                    <b>Recherche:
                                        <input id="search_word" type="text" placeholder="Rechercher...">
                                    </b>

                                    <br>
                                    <br>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Label
                                            </th>
                                            <th>
                                                Prix
                                            </th>
                                            <th>
                                                Catégorie
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                        </thead>
                                        <tbody id="search_result">
                                            <?php

                                            include "../Webservices/AficherTrotinette.php";

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    $imageURL = '../../image/' . $row["image"];


                                            ?>
                                                    <tr>

                                                        <td><?php echo $row['label']; ?></td>
                                                        <td><?php echo $row['prix']; ?></td>

                                                        <td><?php echo $row['label_categorie']; ?></td>

                                                        <td><img src="<?php echo $imageURL; ?>" height="100" width="100" alt="" /></td>



                                                        <td><a class="btn btn-info" href="update.html?Id=<?php echo $row['Id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="../Webservices/SupprimerTrotinette.php?Id=<?php echo $row['Id']; ?>">Delete</a></td>

                                                    </tr>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            $("#search_word").on("keyup", function() {
                                                var value = $(this).val().toLowerCase();
                                                $("#search_result tr").filter(function() {
                                                    $(this).toggle($(this).text()
                                                        .toLowerCase().indexOf(value) > -1)
                                                });
                                            });
                                        });
                                    </script>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <a class="btn btn-info" href="user.html">Ajouter une trotinette</a>

            </div>



            <script>
                // Query the table
                const table = document.getElementById('table');

                // Query the headers
                const headers = table.querySelectorAll('th');

                // Loop over the headers
                [].forEach.call(headers, function(header, index) {
                    header.addEventListener('click', function() {
                        // This function will sort the column
                        sortColumn(index);
                    });
                });

                const tableBody = table.querySelector('tbody');
                const rows = tableBody.querySelectorAll('tr');

                const sortColumn = function(index) {
                    // Clone the rows
                    const newRows = Array.from(rows);

                    // Sort rows by the content of cells
                    newRows.sort(function(rowA, rowB) {
                        // Get the content of cells
                        const cellA = rowA.querySelectorAll('td')[index].innerHTML;
                        const cellB = rowB.querySelectorAll('td')[index].innerHTML;

                        switch (true) {
                            case cellA > cellB:
                                return 1;
                            case cellA < cellB:
                                return -1;
                            case cellA === cellB:
                                return 0;
                        }
                    });

                    // Remove old rows
                    [].forEach.call(rows, function(row) {
                        tableBody.removeChild(row);
                    });

                    // Append new row
                    newRows.forEach(function(newRow) {
                        tableBody.appendChild(newRow);
                    });
                };
            </script>

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

</html>