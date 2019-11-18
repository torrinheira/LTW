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

?>