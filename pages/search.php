<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');
    include_once('../debug/debug.php');

    //city's name passed from form
    $city = $_GET['city'];
    
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
        <h3 class="tile_property">Title: <?= $property['title']?> </h3>
        <h3 class="price_property">Price per night: <?= $property['price']?> </h3>
        <h3 class="city_property">City:<?= $property['city']?> </h3>
        <h3 class="address_property">Address: <?= $property['address']?> </h3>
        <h3 class="description_property">Description: <?= $property['description']?> </h3>
        <h3 class="capacity_property">Max capacity: <?= $property['capacity']?> </h3>
        <h3 class="owner_property"> Owner: <?= getUserUsername($property['owner_id'])?> </h3>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>

    </section>
    
<?php
    }
?>
