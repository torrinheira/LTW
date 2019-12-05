<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_auth.php');    
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_property.php');
    include_once('../database/db_user.php');
    include_once('../database/db_property.php');

    $property_id = $_GET['id'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $numberguest = $_GET['guests'];
    $property = getPropertyInfo($property_id);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php draw_header(); ?>
        <?php draw_property_info($property);?>
        <?php draw_reservation($checkin, $checkout, $numberguest);?>
        <?php draw_footer(); ?>
    </body>
</html>


<?php
    function draw_property_info($property){ ?>

    <section class = info_property>
        <h3 class= "id_property">Property ID: <?= $property['id']?> </h3> 
        <h4 class="tile_property">Title: <?= $property['title']?> </h4>
        <h5 class="price_property">Price per night: <?= $property['price']?> </h5>
        <h5 class="city_property">City:<?= $property['city']?> </h5>
        <h5 class="address_property">Address: <?= $property['address']?> </h5>
        <h5 class="description_property">Description: <?= $property['description']?> </h5>
        <h5 class="capacity_property">Max capacity: <?= $property['capacity']?> </h5>
        <h5 class="owner_property"> Owner: <?= getUserUsername($property['owner_id'])?> </h5>
    </section>
    
<?php
    }
?>