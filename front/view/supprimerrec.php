<?php
	include '../controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerrec($_GET["id_reclamation"]);
	header('Location:afficherrec.php');
