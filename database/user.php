<?php

    include_once('../includes/database.php');

    //funções para verificar e incluir cenas na bd
    //$db = Database::instance()->db(); -> usar esta linha para ter uma  variavél para aceder à db

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
            return 1;
        }
        else{
            return -1;
        }
    }

?>