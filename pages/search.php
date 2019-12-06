<?php

    include_once('../includes/session.php');
    include_once('../includes/input_validation.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');
    include_once('../database/db_reservation.php');
    include_once('../debug/debug.php');



    // TODO: validate all of these inputs
    $city = $_GET['city'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $guests = $_GET['guests'];

    if (!check_input($city)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid input! Only letters and numbers are allowed!');
        die(header('Location: ../index.php'));
    }
    
    //search into the db all properties located in city 'city'
    $city = strtolower($city);

    //allows to know about the number of houses found
    $number_of_properties = 0;

    // get properties in the following format
    // $cities['id'] = property_id   $cities['city'] = city_name
    $properties = get_properties_cities(); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">

        <script src="../javascript/valid_date.js" defer></script>
    </head>
    <body>
        
        <?php draw_header(); ?>

        <?php draw_search(); ?>

        <ul>
        <?php 
            foreach ($properties as $property) {
                //if a property is available to rent 
                $is_available = TRUE;

                if (levenshtein($property['city'], $city) <= 3) {
                    $property_info = get_property_info($property['id']);
                    $owner_username = get_username($property_info['owner_id']);
                    $reservations = all_property_reservation($property['id']);

                    //checks all properties reservations one by one
                    foreach($reservations as $reservation){
                        console_log('ok');
                        console_log($reservation['arrival_date']);
                        console_log($reservation['departure_date']);
                        console_log($checkin);
                        console_log($checkout);

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
                        draw_property_list_item($property_info, $owner_username, $checkin, $checkout, $guests);
                        $number_of_properties = $number_of_properties + 1;
                    }
                }
            }
            
            if($number_of_properties == 0){ 
                draw_no_found();
            }
        ?>
        </ul>

        <?php draw_footer(); ?>

    </body>
</html>
