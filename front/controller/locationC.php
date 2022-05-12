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

    function afficherTrottinette()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from trottinette');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function ajouterlocation(Location $location)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('insert into location (date_debut,date_fin,numero,adresse,iduser) values (:date_debut,:date_fin,:numero,:adresse,:iduser) ');
            $query->execute([
                'date_debut' => $location->getDateDebut(),
                'date_fin' => $location->getDateFin(),
                'numero' => $location->getNumero(),
                'adresse' => $location->getAdresse(),
                'iduser' => $location->getIduser()
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getderlocation()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select id from location  ORDER BY id DESC LIMIT 1');
            $query->execute();
            $result = $query->fetchColumn(0);
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function afficherelocationbysuer(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from location where iduser=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchALL();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function getLocation(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from location  where id=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function modifierlocation(Location $location, int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE location SET 
        date_debut = :date_debut, 
        date_fin = :date_fin,
        numero= :numero,
        adresse= :adresse
        WHERE id = :id  ');

            $query->execute([
                'date_debut' => $location->getDateDebut(),
                'date_fin' => $location->getDateFin(),
                'numero' => $location->getNumero(),
                'adresse' => $location->getAdresse(),
                'id' => $id
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
