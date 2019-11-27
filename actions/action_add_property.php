<?php

    include_once('../includes/session.php');
    include_once('../database/property.php');

    //verify if user is logged in
    if(!isset($_SESSION['username'])){
        die(header('Location: ../pages/login.php'));
    }

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