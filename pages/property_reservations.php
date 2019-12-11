<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    include_once('../database/db_reservation.php');
    include_once('../debug/debug.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../templates/tpl_reservation.php');



    if ($_SESSION['username'] == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'You must login to be able to see reservations.');
        die(header('Location: ./login.php'));
    }

    $username = $_SESSION['username'];
    $property_id = $_GET['id'];

    //$reservations = reservations_of_property($property_id);
    $upcoming_reservations = reservations_of_property_upcoming($property_id);
    $current_reservation = current_reservation($property_id);
    $previous_reservations = reservations_of_property_previous($property_id);
   

    $number_previous = count($previous_reservations);
    $number_upcoming = count($upcoming_reservations);
    $number_current = count($current_reservation);
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">

        <link href="../css/common.css" rel="stylesheet">
        <script src="../javascript/messages.js" type="module" defer></script>
    </head>

    <body>

        <?php draw_header(); ?>
        <section id="current_reservation">
            <header>Current Reservation</header>
            <ul>
            <?php if($number_current > 0){
                    foreach($current_reservation as $reservation){
                        draw_current_previous($reservation);
                    }
                }
                else{
                    draw_no_property_reservations();
                }
            ?>
            </ul>
        </section>

        <section id="upcoming_reservations">
            <header>Upcoming Reservations</header>
            <ul>
            <?php if($number_upcoming > 0){

                
                    foreach($upcoming_reservations as $upcoming_reservation){
                        draw_upcoming($upcoming_reservation);
                    }
            
                }
                else{
                    draw_no_property_reservations();
                } ?>
            </ul>
        </section>

        <section id="previous_reservations">
            <header>Previous Reservations</header>

            <ul>
            <?php if($number_previous > 0){
                    foreach($previous_reservations as $previous_reservation){
                        draw_current_previous($previous_reservation);
                    }
                }
                else{
                    draw_no_property_reservations();
                }
            ?>

            </ul>
        </section>
        
        
        <?php draw_footer(); ?>

    </body>

</html>