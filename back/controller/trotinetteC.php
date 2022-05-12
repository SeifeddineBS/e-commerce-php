<?php
require_once "../../db_connnection.php";
require_once "../model/Trotinette.php" ; 

class trotinettec{

    function affichertrotinette()
    {   
        $pdo=config::getConnexion();
        try
        { 
            $query = $pdo->prepare('SELECT * FROM trotinette INNER JOIN categorie ON trotinette.id_categorie = categorie.id_categorie');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $t)
        {
            die('erreur :'.$t->getMessage());
        }

    }
    
    function ajouterTrotinette(Trotinette $trotinette)
    {
        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into trotinette (label,prix,id_categorie,image) values (:label,:prix,:id_categorie,:image)');
            $query->execute(['label' => $trotinette->getLabel(),
            'prix'=>$trotinette->getPrix(),
            'id_categorie'=>$trotinette->getid_categorie(),
            'image'=>$trotinette->getImage(),
            ]);
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }

    function supprimerTrotinette(int $id)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from trotinette where id = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
            
        }
    }

    function modifierTrotinette(Trotinette $trotinette,int $id )
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE trotinette SET prix =:prix, id_categorie=:id_categorie, label =:label WHERE Id =:Id');

            $query->execute(['label' => $trotinette->getLabel(),
                            'id_categorie' => $trotinette->getid_categorie(),
                            'prix' => $trotinette->getprix(),
                            'Id' => $id]);
            }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }    

    function verif(trotinette $trotinette)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from trotinette where label=:label');
            $query->execute(['label' => $trotinette->getLabel(),
            'prix' => $trotinette->getprix(),
            'id_categorie' => $trotinette->getid_categorie(),
            
                
            ]);
            $result=$query->fetch();
            return $result;
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        } 
    }
    function getTrotinette(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM trotinette INNER JOIN categorie ON trotinette.id_categorie = categorie.id_categorie where id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $t)
        {
            die('Erreur: '.$t->getMessage());
        }
    }

}
