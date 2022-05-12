<?php
require_once '../controller/locationC.php';
$id=$_GET["idlocation"];
$locationc=new Locationc();
$location=$locationc->supprimerlocation($id);
header("Location: ../view/affichierlocation.php");
?>