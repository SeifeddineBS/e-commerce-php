<?php
require_once "../../db_connnection.php";
require_once "../model/location.php";

class Locationc
{

    function afficherelocation()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from location');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function getuser(int $iduser)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from user  where id=:id');
            $query->execute(['id' => $iduser]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }

    function supprimerlocation(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('delete from location where id = :id');
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
