<?php
require_once '../controller/participationc.php';
$id=$_GET["supprimer"];
$participantc=new Participationc();
$part=$participantc->supprimerparticipation($id,1);
header("Location: ../view/affichierevenementparticiper.php");
