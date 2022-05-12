<?php

require_once "../../db_connnection.php";
include '../model/User.php';


class UserContoller
{



    function ajouterUtilisateur($user)
    {

        $sql = "INSERT INTO user (username,email,password,role) VALUES (:username,:email,:password,:role)";
        $db = config::getConnexion();

        try {

            $query = $db->prepare($sql);

            $query->execute([
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => 'USER',
            ]);
            $username = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            // header("location: welcome.php?username=$username,email=$email");


        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    function modifierUtilisateur($user, $id)
    {

        try {
            $db = config::getConnexion();


            $sql = "UPDATE user  SET username= :username,email= :email,password= :password WHERE id= :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':username', $user->getUsername());
            $req->bindValue(':id', $id);
            $req->bindValue(':email', $user->getEmail());
            $req->bindValue(':password', $user->getPassword());

            $req->execute();
            //	echo $query->rowCount() . " records UPDATED successfully <br>";

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function supprimerUtilisateur($id)
    {
        $sql = "DELETE FROM user WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }



    function afficherUtilisateur()
    {
        $sql = 'SELECT * FROM user  ';
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return ($list);
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }



    function afficherUtilisateurTrier()
    {
        $sql = 'SELECT * FROM user ORDER BY email ASC  ';
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return ($list);
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }

    function recupererUtilisateur($id)
    {
        $sql = 'SELECT * FROM user WHERE id=:id';
        $db = config::getConnexion();
        try {


            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }

    function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $db = config::getConnexion();
        try {

            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();

            // var_dump($user['email']);
            $email = $user['email'];
            $password = $user['password'];
            $role = $user['role'];
            $id = $user['id'];
            $count = $query->rowCount();
            if ($count == 1) {

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;

                if ($role == 'ADMIN') {
                    header("location:../../back/view/listeutilisateur.php");
                } else
                    header("location:my-profile.php?username=$username&id=$id&email=$email&password=$password");
            } else {
                $error = "Your Login Name or Password is invalid";
            }
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }


    function logout()
    {


        if (session_destroy()) {
            header("Location: login.php");
        }
    }



    function FindUser($username, $email)
    {
        $sql = "SELECT * FROM user where username like '" . $username . "' or email like '" . $email . "'";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }


    function rechercheuser($username, $email)
    {


        $sql = 'SELECT * FROM user WHERE username=:username and email=:email ';
        $db = config::getConnexion();

        try {


            $query = $db->prepare($sql);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $list = $db->query($sql);
            return ($list);
        } catch (Exception $e) {
            echo 'Erreur' . $e->getMessage();
        }
    }





    function setAdmin($id)
    {
        try {
            $db = config::getConnexion();


            $sql = "UPDATE user  SET role= :role WHERE id= :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':role', 'ADMIN');
            $req->bindValue(':id', $id);

            $req->execute();
            //	echo $query->rowCount() . " records UPDATED successfully <br>";

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
