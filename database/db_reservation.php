<?php

    include_once('../includes/database.php');


    function all_property_reservation($property_id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM reservation WHERE property_id = ?');
        $stmt->execute(array($property_id));

        return $stmt->fetchAll();

    }

    function add_reservation($property_id, $tourist_id, $arrival_date, $departure_date){
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO reservation(property_id, tourist_id, arrival_date, departure_date) VALUES(?, ?, ?, ?)');
        $stmt->execute(array($property_id, $tourist_id,$arrival_date, $departure_date));

    }

    function get_user_reservations($user_id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM reservation WHERE tourist_id = ?');
        $stmt->execute(array($user_id));

        return $stmt->fetchAll();
    }
?>