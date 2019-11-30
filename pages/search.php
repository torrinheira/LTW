<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../database/db_property.php');
    include_once('../debug/debug.php');


    $city = $_GET['city'];

    $lower_city = strtolower($city);
    $all_properties = searchProperties($lower_city);
    //print_r($all_properties);
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
        <h3 class="id_property"><?= $property['id']?> </h3>
        <h3 class="tile_property"><?= $property['title']?> </h3>
        <h3 class="price_property"><?= $property['price']?> </h3>
        <h3 class="city_property"><?= $property['city']?> </h3>
        <h3 class="address_property"><?= $property['address']?> </h3>
        <h3 class="description_property"><?= $property['description']?> </h3>
        <h3 class="capacity_property"><?= $property['capacity']?> </h3>
        <h3 class="owner_property"><?= $property['owner_id']?> </h3>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <p> - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>

    </section>
    
<?php
    }
?>
