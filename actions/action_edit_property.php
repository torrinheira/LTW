<?php
    include_once('../includes/session.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');



    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to edit your property');
        die(header('Location: ../pages/login.php'));
    }

    $property_id = $_POST['id_property'];
    $user_id = getUserID($username);

    // validate the new first name
    $new_title = $_POST['new_title'];
    // TODO: check for invalid characters

    
    $new_price = $_POST['new_price'];

    // validate the new city
    $new_city = strtolower($_POST['new_city']);
    // TODO: check for invalid characters

    // validate the new address
    $new_address = $_POST['new_address'];
    // TODO: check for invalid characters

    // validate the new description
    $new_description = $_POST['new_description'];
    // TODO: check for invalid characters

    $new_capacity = $_POST['new_capacity'];

    update_property($property_id, $new_title, $new_price, $new_city, $new_address, $new_description, $new_capacity, $user_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Property info updated!');
    //TODO: change here the page
    header('Location: ../pages/profile.php');


?>