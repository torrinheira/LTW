<?php

    include_once('../includes/database.php');

    //functions related with properties(remove, add, change,..)


    /* adds a new property to db */
    function addProperty($username, $title, $price_night, $city, $address, $description, $capacity){
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO property VALUES(?, ?, ?, ?, ?, ?, ?, ?)');

    }

?>