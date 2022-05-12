<?php
require_once '../controller/DetailLocationC.php';
$idlocation=$_GET["idlocation"];
$idTrottinette=$_GET["idtrotinnete"];
$detailLocationc=new DetailLocationC();
$tro=$detailLocationc->supprimertrotinete($idlocation,$idTrottinette);
header("Location: ../view/affichierdetailmeslocation.php?idlocation=".$idlocation);
