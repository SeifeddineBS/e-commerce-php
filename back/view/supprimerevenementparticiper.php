<?php
require_once '../controller/participationc.php';
$id=$_GET["supprimer"];
$idevent=$_GET["event"];
$participationc=new Participationc();
$part=$participationc->supprimerparticipation($id,$idevent);
header("Location: ../view/affichierevenement.php");
