<?php

include_once('../includes/session.php');
include_once('../includes/input_validation.php');
include_once('../includes/redirect.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_property.php');
include_once('../database/db_property.php');
include_once('../database/db_user.php');
include_once('../database/db_reservation.php');
include_once('../debug/debug.php');



$city = $_GET['city'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$guests = $_GET['guests'];
$minprice = $_GET['minprice'];
$maxprice = $_GET['maxprice'];

$search_all = FALSE;

if (empty($city)) {
    $search_all = TRUE;
} else if (!check_input($city)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid input!');
    die(header('Location: ../index.php'));
}

if(!check_dates($checkin ) || !check_dates($checkout)){
    die(redirect('error', 'Date: invalid format'));
}

if($checkout <= $checkin){
    die(redirect('error', 'Checkout must be bigger than checkin'));
}

if($minprice > $maxprice){
    die(redirect('error', 'Maximum price must be equal or greater than Minimum price'));
}

if($guests <= 0){
    die(redirect('error', 'Guest: bigger or equal to 1'));
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/search.css" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <script src="../javascript/authentication.js" type="module" defer></script>
    <script src="../javascript/messages.js" type="module" defer></script>

    <script src="../javascript/valid_date.js" defer></script>
</head>

<body>

    <?php draw_header(); ?>
    <?php draw_search(); ?>

    <ul class="results">
        <?php
        foreach ($properties as $property) {
            //if a property is available to rent 
            $is_available = TRUE;

            if (!$search_all) {
                if (levenshtein($property['city'], $city) <= 3) {
                    $property_info = get_property_info($property['id']);
                    $owner_username = $property_info['owner'];
                    $reservations = all_property_reservation($property['id']);

                    //checks all properties reservations one by one
                    foreach ($reservations as $reservation) {

                        if ($checkin >= $reservation['arrival_date'] && $checkin < $reservation['departure_date']) {
                            $is_available = FALSE;
                            break;
                        } else if ($checkout > $reservation['arrival_date'] && $checkout <= $reservation['departure_date']) {
                            $is_available = FALSE;
                            break;
                        } else if (($checkin <= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout >= $reservation['departure_date'])) {
                            $is_available = FALSE;
                            break;
                        } else if (($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date'])) {
                            $is_available = FALSE;
                            break;
                        }
                    }

                    if (($property_info['capacity'] >= $guests) && $is_available && $property_info['price'] >= $minprice && $property_info['price'] <= $maxprice) {           
                        $image = "../images/not_found.jpg";
                        draw_property_list_item($image, $property_info, $checkin, $checkout, $guests);
                        $number_of_properties = $number_of_properties + 1;
                    }
                }
            } else {
                $property_info = get_property_info($property['id']);
                $owner_username = $property_info['owner'];
                $reservations = all_property_reservation($property['id']);

                //checks all properties reservations one by one
                foreach ($reservations as $reservation) {

                    if ($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) {
                        $is_available = FALSE;
                        break;
                    } else if ($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date']) {
                        $is_available = FALSE;
                        break;
                    } else if (($checkin <= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout >= $reservation['departure_date'])) {
                        $is_available = FALSE;
                        break;
                    } else if (($checkin >= $reservation['arrival_date'] && $checkin <= $reservation['departure_date']) && ($checkout >= $reservation['arrival_date'] && $checkout <= $reservation['departure_date'])) {
                        $is_available = FALSE;
                        break;
                    }
                }

                if (($property_info['capacity'] >= $guests) && $is_available && $property_info['price'] >= $minprice && $property_info['price'] <= $maxprice) {
                    $image = "../images/not_found.jpg";
                    draw_property_list_item($image, $property_info, $checkin, $checkout, $guests);
                    $number_of_properties = $number_of_properties + 1;
                }
            }
        }

        if ($number_of_properties == 0) {
            draw_no_found();
        }
        ?>
    </ul>
    <?php draw_footer(); ?>

</body>

</html>