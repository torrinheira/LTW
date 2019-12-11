<?php

include_once('../includes/database.php');
include_once('db_user.php');




/* adds a new property to db */
function addProperty($title, $price_night, $city, $address, $description, $capacity, $owner)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO property(title, price, city, address, description, capacity, owner) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($title, $price_night, $city, $address, $description, $capacity, $owner));
}


function get_properties_cities()
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT id, city FROM property');
    $stmt->execute();

    return $stmt->fetchAll();
}

function getCitiesID($city)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT id FROM property WHERE city = ?');
    $stmt->execute(array($city));

    return $stmt->fetchAll();
}

function get_property_info($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM property WHERE id = ?');
    $stmt->execute(array($property_id));

    return $stmt->fetch();
}

function get_user_properties($owner)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM property WHERE owner = ?');
    $stmt->execute(array($owner));

    return $stmt->fetchAll();
}

function delete_property($property_id)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM property WHERE id = ?');
    $stmt->execute(array($property_id));
}

function update_property($property_id, $new_title, $new_price, $new_city, $new_address, $new_description, $new_capacity)
{
    $db = Database::instance()->db();

    $stmt = $db->prepare('UPDATE property SET (title, price, city, address, description, capacity) = (?, ?, ?, ?, ?, ?) WHERE id = ?');
    $stmt->execute(array($new_title, $new_price, $new_city, $new_address, $new_description, $new_capacity, $property_id));
}

