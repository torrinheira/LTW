<?php

    include_once('../includes/session.php');
    include_once('../includes/input_validation.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');


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

    // get properties in the following format
    // $cities['id'] = property_id   $cities['city'] = city_name
    $properties = get_properties_cities(); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    <body>
        
        <?php draw_header(); ?>

        <?php draw_search(); ?>

        <ul>
        <?php 
            foreach ($properties as $property) {
                if (levenshtein($property['city'], $city) <= 3) {
                    $property_info = get_property_info($property['id']);
                    $owner_username = get_username($property_info['owner_id']);
                    draw_property_list_item($property_info, $owner_username, $checkin, $checkout, $guests);
                }
            }   
        ?>
        </ul>

        <?php draw_footer(); ?>

    </body>
</html>
