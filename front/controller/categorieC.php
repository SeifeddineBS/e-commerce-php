<?php
require_once "../../db_connnection.php";
require_once "../model/Categorie.php" ; 

class Categoriec{

    function afficherCategorie()
    {   $pdo=config::getConnexion();
        try
        { 
            $query = $pdo->prepare('select from * categorie');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $t)
        {
            die('erreur :'.$t->getMessage());
        }

    }
    function ajouterCategorie(Categorie $categorie)
    {

        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into categorie (label_categorie) values (:label_categorie)');
            $query->execute(['label_categorie' => $categorie->getLabel_categorie(),
                
            ]);
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }

    }

    function supprimerCategorie(int $id_categorie)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from categorie where id_categorie = :id');
            $query->execute(['id_categorie' => $id]);
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }
    function modifierCategorie(Trotinette $categorie,int $id )
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE categorie SET 
        label_categorie = :label_categorie, 
        
        WHERE id_categorie = :id  ');

            $query->execute(['label_categorie' => $categorie->getLabel_categorie(),
                
                'id_categorie' => $id]);
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }

    }
    function verif(Categorie $categorie)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from categorie where label_categorie=:label_categorie');
            $query->execute(['label_categorie' => $categorie->getLabel_categorie(),
                
                
            ]);
            $result=$query->fetch();
            return $result;
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }
    function getcategorie(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM categorie where id_categorie = :id');

            $query->execute(['id_categorie'=>$Id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }

}
