<?php

    include_once('../includes/database.php');


    //functions related with users (login, logout, signup)

    function availableUsername($username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        return $stmt->fetch() ? false : true;
    }

    function insertUser($username, $email, $password, $first_name, $last_name) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO user(username, email, password, first_name, last_name) VALUES(?, ?, ?, ?, ?)');

        $stmt->execute(array($username, $email, password_hash($password, PASSWORD_DEFAULT), $first_name, $last_name));
    }

    function validCredentials($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        $user = $stmt->fetch();

        return $user !== false && password_verify($password, $user['password']);
    }

    function getUserInfo($username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        return $stmt->fetch();
    }

    function changePassword($username, $new_password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE user SET password = ? WHERE username = ?');
        $stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT), $username));

        return $stmt->fetch();
    }

    function changeProfile($username, $new_username, $new_first_name, $new_last_name, $new_email, $new_description) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('UPDATE user SET (username, first_name, last_name, email, description) = (?, ?, ?, ?, ?) WHERE username = ?');
        $stmt->execute(array($new_username, $new_first_name, $new_last_name, $new_email, $new_description, $username));
        
        return $stmt->fetch();
    }

    function getUserID($username){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT id FROM user WHERE username = ?');
        $stmt->execute(array($username));

        //if doesn't exists nothing it returns null
        return $stmt->fetch()['id'];
    }

    function getUserUsername($id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT username FROM user WHERE id = ?');
        $stmt->execute(array($id));

        //if doesn't exists nothing it returns null
        return $stmt->fetch()['username'];
    }
    
?>
