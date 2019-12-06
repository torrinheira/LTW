<?php
    include_once('../includes/session.php');
    include_once('../database/db_property.php');
    include_once('../debug/debug.php');


    $username = $_SESSION['username'];

    $property_id = $_POST['property_id'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests = $_POST['guests'];

    //we need to verify again if dates and number of guests are right, otherwise is not possible to conclude the reservation

    //TODO: read readme @github
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to confirm your reservation.');
        die(header('Location: ../pages/login.php'));
    }

    
?>