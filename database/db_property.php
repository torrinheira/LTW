<?php

    include_once('../includes/database.php');
    include_once('./db_user.php');

    //functions related with properties(remove, add, change,..)



    /* adds a new property to db */
    function addProperty($username, $title, $price_night, $city2, $address, $description, $capacity){
        $db = Database::instance()->db();

        //saves the city at lower case
        $city = strtolower($city2);
        //TODO: check if user is valid or not (in other word, only a logged user can add a property)
        $user_id = getUserID($username);

        
        $stmt = $db->prepare('INSERT INTO property( title, price, city, address, description,capacity, owner_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $price_night, $city, $address, $description, $capacity, $id ));

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

    function getAllCities(){
        $db = Database::instance()->db();

        $stmt = $db->prepare('SELECT city FROM property');
        $stmt->execute();

        return $stmt->fetchAll();

    }

    

?>