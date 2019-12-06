<?php

    include_once('../includes/database.php');


    function all_property_reservation($property_id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ?');
        $stmt->execute(array($property_id));

        return $stmt->fetchAll();

    }
?>