<?php
require_once '../controller/categoriec.php';
$id_categorie=$_GET["Id"];
$categorieC=new Categoriec();
$listCategorie=$categorieC->supprimerCategorie($id_categorie); 
header("Location: ../view/2AfficherCategorie.php");
?>