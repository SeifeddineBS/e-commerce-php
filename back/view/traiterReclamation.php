<?PHP
include '../controller/reclamationC.php';
$reclamationC = new reclamationC();
if (isset($_POST["id_reclamation"])) {

    $reclamationC->traiterReclamation($_POST["id_reclamation"]);


    header('Location: afficherReclamation.php');
}
