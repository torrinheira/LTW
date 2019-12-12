<?php

    include_once('../includes/session.php');
    include_once('../database/db_property.php');
    include_once('../includes/input_validation.php');
    include_once('../includes/redirect.php');


    $username = $_SESSION['username'];

    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to continue.');
        die(header('Location: ../pages/login.php'));
    }


    $property_id = $_GET['id'];
    $info = get_property_info($property_id);

    if($info['owner'] != $username){
        die(redirect('error','You cannot delete other user property'));
    }
    delete_property($property_id);

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Property deleted.');
    header("Location: ../pages/manage_properties.php");

?>
