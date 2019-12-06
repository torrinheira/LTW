<?php

    include_once('../includes/database.php');
    include_once('db_user.php');

    //functions related with properties(remove, add, change,..)



    /* adds a new property to db */
    function addProperty($title, $price_night, $city, $address, $description, $capacity, $user_id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('INSERT INTO property(title, price, city, address, description, capacity, owner_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $price_night, $city, $address, $description, $capacity, $user_id));
    }

    /* lists all the properties of a user with username 'username */
    function allPropertiesOfUser($username){
        $db = Database::instance()->db();

        $user_id = getUserID($username);

        $stmt = $db->prepare('SELECT * FROM property WHERE owner_id = ?');
        $stmt->execute(array($user_id));

        return $stmt->fetchAll();
    }

    //returns all info about a property in a city passed as argument
    function searchProperties($city){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM property WHERE city = ?');
        $stmt->execute(array($city));

        return $stmt->fetchAll();
    }

    function get_properties_cities(){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT id, city FROM property');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getCitiesID($city){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT id FROM property WHERE city = ?');
        $stmt->execute(array($city));

        return $stmt->fetchAll();
    }

    function get_property_info($property_id){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT * FROM property WHERE id = ?');
        $stmt->execute(array($property_id));

        return $stmt->fetch();
    }
    

?>
