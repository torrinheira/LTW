<?php
    include_once('../includes/session.php');
    include_once('../database/db_property.php');
    include_once('../database/db_reservation.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');


    $username = $_SESSION['username'];

    $property_id = $_POST['property_id'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests = $_POST['guests'];


    //TODO: read readme @github
    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to confirm your reservation.');
        die(header('Location: ../pages/login.php'));
    }

    $user_id = get_user_id($username);

    //we need to verify again if dates and number of guests are right, otherwise is not possible to conclude the reservation
    if($checkout <= $checkin){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please verify your check in and check out dates.');
        die(header('Location: ../index.php'));
    }


    //checks all properties reservations one by one
    $property_info = get_property_info($property_id);
    $reservations = all_property_reservation($property_id);

    $is_available = TRUE;
    foreach($reservations as $reservation){

        if($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']){
            $is_available = FALSE;
            break;
        }
        else if($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date']){
            $is_available = FALSE;
            break;
        }
        else if(($checkin <= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout >= $reservation['departure_date'])){
            $is_available = FALSE;
            break;
        }
        else if(($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date'])){
            $is_available = FALSE;
            break;
        }
    }

                    
    if(($property_info['capacity'] >= $guests) && $is_available){
        add_reservation($property_id, $user_id, $checkin, $checkout);
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Reservation made successfully..');
        die(header('Location: ../index.php'));
    }
    else{
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'An error occurred while booking. Please check your data.');
        die(header('Location: ../index.php'));
    }

    
?>