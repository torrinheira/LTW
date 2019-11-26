<?php

    include_once('../includes/database.php');

    function availableUsername($username) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        return !$stmt->fetch();
    }

    function insertUser($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO user VALUES(?, ?)');

        // TODO: generate a random salt and add it to the password
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
    }

    function validCredentials($username, $password) {
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));

        $user = $stmt->fetch();

        return $user !== false && password_verify($password, $user['password']);
    }
    
?>