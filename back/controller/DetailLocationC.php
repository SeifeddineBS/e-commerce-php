<?php
require_once "../../db_connnection.php";
require_once "../model/DetailLocation.php" ;

class DetailLocationC{

    function affichertrotinnete(int $id)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from detaillocation where idlocation=:id');
            $query->execute(['id'=>$id]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function gettrotinnet(int $idtrotinnet)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from trottinette  where idtrottinette=:id');
            $query->execute(['id'=>$idtrotinnet]);
            $result = $query->fetch();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function supprimertrotinete(int $idlocation,int $idTrottinette)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from detaillocation where idlocation = :idlocation and idtrottinette=:idTrottinette');
            $query->execute(['idlocation' => $idlocation,'idTrottinette'=>$idTrottinette]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}
