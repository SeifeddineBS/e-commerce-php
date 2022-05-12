<?php
require_once "../../db_connnection.php";
require_once "../model/participation.php" ;

class Participationc{

    function afficherparticipation(int $idevent)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from user e join participation p on e.id=p.iduser where p.idevent=:idevent ');
            $query->execute(['idevent'=>$idevent]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }

    function afficherParticipations()
    {   $pdo=config::getConnexion();
        try
        {
            $sql = 'select * from participation';
            $result = $pdo->query($sql);
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }

    function supprimerparticipation(int $id,int $idevent)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from participation where iduser = :id and idevent=:idevent');
            $query->execute(['id' => $id,
                'idevent'=>$idevent]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}
