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
        <?php draw_search(); ?>
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
        <p> ID: <?= $property['id']?> </p>
        <p> Title: <?= $property['title']?> </p>
        <p> Price: <?= $property['price']?> </p>
        <p> City: <?= $property['city']?> </p>
        <p> Address: <?= $property['address']?> </p>
        <p> Description: <?= $property['description']?> </p>
        <p> Capacity: <?= $property['capacity']?> </p>
        <p> Owner: <?= $property['owner_id']?> </p>
    
<?php
    }
    ?>