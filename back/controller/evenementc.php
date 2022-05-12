<?php
require_once "../../db_connnection.php";
require_once "../model/evenement.php";

class Evenementc
{

    function afficherevenement()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from evenement');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        } catch (Exception $e) {
            die('erreur :' . $e->getMessage());
        }
    }
    function ajouterevenement(Evenement $evenement)
    {

        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('insert into evenement (titre,description,type,lieu,date,nbparticipant,image) values (:titre,:description,:type,:lieu,:date,:nbparticipant,:image)');
            $query->execute([
                'titre' => $evenement->getTitre(),
                'description' => $evenement->getDescription(),
                'type' => $evenement->getType(),
                'lieu' => $evenement->getLieu(),
                'date' => $evenement->getDate(),
                'nbparticipant' => $evenement->getNbparticipant(),
                'image' => $evenement->getImage()
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerevenement(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('delete from evenement where idevent = :id');
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifierevenement(Evenement $event, int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE evenement SET 
        titre = :titre, 
        description = :description,
        type= :type,
        lieu= :lieu,
        date= :date,
        nbparticipant=:nbparticipant,
        image=:image
        WHERE idevent = :id  ');

            $query->execute([
                'titre' => $event->getTitre(),
                'description' => $event->getDescription(),
                'type' => $event->getType(),
                'lieu' => $event->getLieu(),
                'date' => $event->getDate(),
                'nbparticipant' => $event->getNbparticipant(),
                'image' => $event->getImage(),
                'id' => $id
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function verif(Evenement $evenement)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('select * from evenement where titre=:titre and description=:description and type=:type and lieu=:lieu and date=:date');
            $query->execute([
                'titre' => $evenement->getTitre(),
                'description' => $evenement->getDescription(),
                'type' => $evenement->getType(),
                'lieu' => $evenement->getLieu(),
                'date' => $evenement->getDate(),
            ]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function affichertrier()
    {
        $sql = 'SELECT * FROM evenement ORDER BY Titre ASC  ';
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return ($list);
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }
    function Find($Titre, $Lieu)
    {
        $sql = "SELECT * FROM evenement where Titre like '" . $Titre . "' or Lieu like '" . $Lieu . "'";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }





    function getevenet(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM evenement where idevent = :id');

            $query->execute(['id' => $id]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
