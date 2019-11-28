<?php

    include_once('../includes/session.php');
    include_once('./templates/tpl_common.php');
    include_once('../database/db_property.php');

    $city = $_GET['city'];

    $lower_city = strtolower($city);
    $all_properties = searchProperties($lower_city);
    print_r($all_properties);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <?php draw_header(); ?>
        <!--TODO: Remove this to another places, it's just here fot testing  -->   
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
        <h2 class="id_property"><?= $property['id']?> </h2>
        <h2 class="tile_property"><?= $property['title']?> </h2>
        <h2 class="price_property"><?= $property['price']?> </h2>
        <h2 class="city_property"><?= $property['city']?> </h2>
        <h2 class="address_property"><?= $property['address']?> </h2>
        <h2 class="description_property"><?= $property['description']?> </h2>
        <h2 class="capacity_property"><?= $property['capacity']?> </h2>
        <h2 class="owner_property"><?= $property['owner_id']?> </h2>
    </section>
    
<?php
    }
    ?>