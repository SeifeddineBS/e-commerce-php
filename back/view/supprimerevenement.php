<?php
require_once '../controller/evenementc.php';
$id=$_GET["supprimer"];
$evenmentc=new Evenementc();
$evenment=$evenmentc->supprimerevenement($id);
header("Location: ../view/affichierevenement.php");
?>