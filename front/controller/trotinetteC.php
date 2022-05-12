<?php
require_once "../../db_connnection.php";
require_once "../model/trotinette.php";

class trotinettec
{

    function affichertrotinette()
    {




        $sql = " SELECT * FROM trotinette INNER JOIN categorie ON trotinette.id_categorie = categorie.id_categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    /*function afficherTrotinette()
     {   
         sql = "SELECT * FROM trotinette INNER JOIN categorie ON trotinette.id_categorie = categorie.id_categorie;";

       $result = $conn->query($sql);
        
        
       if (isset($_GET['Id'])) {
        
          $Id = $_GET['Id']; 
        
         $sql = "SELECT * FROM `trotinette`INNER JOIN categorie ON trotinette.id_categorie = categorie.id_categorie WHERE trotinette.Id = $Id;";
        
            $result = $conn->query($sql); 
        
            if ($result->num_rows > 0) {        
        
                 while ($row = $result->fetch_assoc()) {
        
                     $id_categorie= $row['id_categorie'];
        
                     $prix = $row['prix'];
        
                     $label = $row['label'];
                    
                  $categorie = $row['label_categorie'];
        
                     $id = $row['Id'];
        
                 } 
    } else{ 
        
                    header('Location: AficherTrotinette.html');
                    
                    } 
                    
                     }
     } */

    function ajouterTrotinette(Trotinette $trotinette)
    {

        $pdo = config::getConnexion();
        // try
        // {

        if (isset($_POST['submit'])) {

            $targetDir = "D:/xampp/htdocs/Trotti/image/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $label = $_POST['label'];

            $price = $_POST['price'];

            $categorie = $_POST['label_categorie'];

            $sql_cat = "SELECT * FROM `categorie` WHERE `label_categorie`='$categorie'";

            $result_cat = $conn->query($sql_cat);

            if ($result_cat->num_rows > 0) {

                while ($row_cat = $result_cat->fetch_assoc()) {

                    $id_categorie = $row_cat['id_categorie'];
                }
            }

            //image_insert

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                    $sql = "INSERT INTO `trotinette`(`label`, `prix`, `id_categorie`, `image`) VALUES ('$label','$price','$id_categorie','$fileName')";

                    $result = $conn->query($sql);

                    if ($result == TRUE) {

                        header('Location: ../Trotti_Admin/index.html');
                    } else {

                        echo "Error:" . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
            }
        }
    }
}




function supprimerTrotinette(int $id)
{
    $pdo = config::getConnexion();
    // try
    // { 
    if (isset($_GET['Id'])) {

        $Id = $_GET['Id'];

        $sql = "DELETE FROM `trotinette` WHERE `Id`='$Id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Record deleted successfully.";
            header('Location: ../Trotti_Admin/index.html');
        } else {

            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}
function modifierTrotinette(Evenement $trotti, int $id)
{
    $pdo = config::getConnexion();
    // try {


    if (isset($_POST['update'])) {

        $prix = $_POST['price'];

        $label = $_POST['label'];

        // $categorie = $_POST['label_categorie'];


        $Id = $_POST['Id'];

        //$sql_cat = "SELECT * FROM `categorie` WHERE `label_categorie`='$categorie'";

        //$result_cat = $conn->query($sql_cat); 

        // if ($result_cat->num_rows > 0) {        

        //  while ($row_cat = $result_cat->fetch_assoc()) {

        //    $id_categorie= $row_cat['id_categorie'];

        //  } 

        $sql = "UPDATE trotinette SET   prix ='$prix', label ='$label' WHERE Id ='$Id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            header('Location: ../Trotti_Admin/index.html');
            echo "Record updated successfully.";
            // header('Location: AficherTrotinette.html');

        } else {

            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}
function verif(Evenement $evenement)
{
    $pdo = config::getConnexion();
    try {
        $query = $pdo->prepare('select * from trotti where label=:label and prix=:prix and id_categorie=:id_categorie ');
        $query->execute([
            'label' => $evenement->getLabel(),
            'Prix' => $evenement->getPrix(),
            'id_categorie' => $evenement->getId_categorie(),

        ]);
        $result = $query->fetch();
        return $result;
    } catch (Exception $t) {
        die('Erreur: ' . $t->getMessage());
    }
}
function getTrotti(int $id)
{
    $pdo = config::getConnexion();
    try {

        $query = $pdo->prepare('SELECT * FROM trotti where id = :Id');

        $query->execute(['id' => $Id]);
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
