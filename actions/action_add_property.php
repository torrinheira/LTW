<?php

    include_once('../includes/session.php');
    include_once('../includes/redirect.php');
    include_once('../includes/input_validation.php');

    include_once('../database/db_user.php');
    include_once('../database/db_property.php');


    //verify if user is logged in
    if (!isset($_SESSION['username'])) {
        die(redirect_login('error', 'Please log in to list your property.'));
    }

    
    $title = $_POST['title'];
    $price_night = $_POST['price'];
    $city = strtolower($_POST['city']);
    $address = $_POST['address'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $owner = $_SESSION['username'];

    if(!check_input($title)){
        die(redirect('error', 'Title: invalid characters'));
    }

    if(!check_input($city)){
        die(redirect('error', 'City: invalid characters'));
    }

    if(!check_input_address($address)){
        die(redirect('error', 'Address: invalid characters'));
    }


    addProperty($title, $price_night, $city, $address, $description, $capacity, $owner);
    

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Property added successfuly!');
    header("Location: ../pages/manage_properties.php");

?>
