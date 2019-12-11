<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');


    //verify if user is logged in
    if (!isset($_SESSION['username'])) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to list your property');
        die(header('Location: ../pages/login.php'));
    }

    //TODO: check if given info is valid (if its field or not)
    //TODO: city can only have letters, otherwise functions were strtolower do not work(i guess, not sure)
    $title = $_POST['title'];
    $price_night = $_POST['price'];
    $city = strtolower($_POST['city']);
    $address = $_POST['address'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $owner = $_SESSION['username'];


    addProperty($title, $price_night, $city, $address, $description, $capacity, $owner);
    

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Property added successfuly!');
    header("Location: ../pages/manage_properties.php");

?>
