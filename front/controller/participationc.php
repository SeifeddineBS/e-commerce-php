<?php
require_once "../../db_connnection.php";
require_once "../model/participation.php" ;

class Participationc{

    function afficherparticipation(int $iduser)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from evenement e join participation p on e.idevent=p.idevent where iduser=:iduser');
            $query->execute([
                'iduser'=>$iduser
                ]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function ajouterparticipation(Participation $participation)
    {

        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into participation (idevent,iduser) values (:idevent,:iduser)');
            $query->execute(['idevent'=>$participation->getIdevent(),
                'iduser'=>$participation->getIduser()
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

    function supprimerparticipation(int $id,int $iduser)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from participation where idevent = :id and iduser=:iduser');
            $query->execute(['id' => $id,
            'iduser'=>$iduser
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function verif(int $idevent,int $iduser)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from participation where idevent=:idevent and iduser=:iduser');
            $query->execute(['idevent'=>$idevent,
                'iduser'=>$iduser
            ]);
            $result = $query->fetch();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
}
