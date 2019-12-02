<?php

    include_once('../includes/session.php');
    include_once('../includes/input_validation.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');

    //city's name passed from form
    $city = $_GET['city'];
    if(!check_input($city)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Invalid input! only letters and numbers are allowed!');
        die(header('Location: ../index.php'));
    }
    
    //search into the db all properties located in city 'city'
    $lower_city = strtolower($city);
    $all_properties = [];


    //extract all properties city kept in the database
    $cities = getAllCities();
    foreach($cities as $city){
        $pos = strpos($city['city'], $lower_city);

        if($pos !== false){
            $more_properties = searchProperties($city['city']);
            $all_properties= array_merge($all_properties, $more_properties);
        }
        else if(levenshtein($city['city'], $lower_city) <= 3){
            $more_properties = searchProperties($city['city']);
            $all_properties= array_merge($all_properties, $more_properties);
        }
    }    
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
        <?php

            foreach($all_properties as $property){
                draw_property_info($property);
            }
        ?>  
        <?php draw_footer(); ?>
    </body>
</html>


<?php
    function draw_property_info($property){ ?>

    <section class = info_property>
        <h3 class="id_property"> Property id: <?= $property['id']?> </h3>
        <h4 class="tile_property">Title: <?= $property['title']?> </h4>
        <h5 class="price_property">Price per night: <?= $property['price']?> </h5>
        <h5 class="city_property">City:<?= $property['city']?> </h5>
        <h5 class="address_property">Address: <?= $property['address']?> </h5>
        <h5 class="description_property">Description: <?= $property['description']?> </h5>
        <h5 class="capacity_property">Max capacity: <?= $property['capacity']?> </h5>
        <h5 class="owner_property"> Owner: <?= getUserUsername($property['owner_id'])?> </h5>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>

    </section>
    
<?php
    }
?>
