<?php

    include_once('../includes/session.php');
    include_once('../database/db_property.php');

    //verify if user is logged in
    if(!isset($_SESSION['username'])){
        die(header('Location: ../pages/login.php'));
    }

    //TODO: check if given info is valid (if its field or not)
    //TODO: city can only have letters, otherwise functions were strtolower do not work(i guess, not sure)
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $price_night = $_POST['price_night'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    addProperty($username, $title, $price_night, $city, $address, $description, $capacity);

    header('Location: ../index.php');

?>