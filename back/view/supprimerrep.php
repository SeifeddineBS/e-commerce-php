<?php
	include '../controller/reponseC.php';
	$reponseC=new reponseC();
	$reponseC->supprimerrep($_GET["id_reponse"]);
	header('Location:afficherrep.php');
