<?php

    include_once('../includes/database.php');

    function usernameExists($username){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute([$username]);

        return $stmt->fetch();
    }

    function isPasswordValide($password){
        if(strlen($password) >=5){                      //verify password length
            if(strcspn($password,'0123456789') + 1){    //verify password has a number
                return true;
            }
        }

        return false;
    }

    function addNewUser($username, $password){
        $db = Database::instance()->db();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare('INSERT INTO user VALUES(?, ?)');
        if($stmt->execute(array($username, $hashed_password))){
            $_SESSION['username'] = $username;
            header("location:../index.php");
        }
        else{
            header("Location:".$_SERVER['HTTP_REFERER']."");
            $_SESSION["ERROR"] = "Error signing up :( ";
        }
    }

    function login($username, $password){

        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ? ');
        $stmt->execute(array($username));

        $user = $stmt->fetch();

        if($user !== false && password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            header("location:../index.php"); //TODO: this page here needs to be changed
        }
        else{
            header("Location:".$_SERVER['HTTP_REFERER']."");
            $_SESSION["ERROR"] = "Username and password do not match...Try again! ";
        }
    }

?>