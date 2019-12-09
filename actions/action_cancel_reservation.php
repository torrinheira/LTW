<?php
    include_once('../includes/session.php');
    include_once('../database/db_reservation.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');



    $username = $_SESSION['username'];
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to cancel your reservation');
        die(header('Location: ../pages/login.php'));
    }

    $reservation_id = $_GET['id'];
    console_log($reservation_id);

    cancel_reservation($reservation_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation canceled!');
    //TODO: change here the page
    header("Location: ../index.php");


?>