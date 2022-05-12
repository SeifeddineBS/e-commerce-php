<?php
require_once '../controller/trotinetteC.php';
$id=$_GET["Id"];
$trotinettec=new trotinettec();
$trotinette=$trotinettec->supprimerTrotinette($id);
header("Location: ../view/1afficherTrotinette.php");
?>
