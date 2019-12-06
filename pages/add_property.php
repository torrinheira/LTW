<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_auth.php');
   // include_once('../database/db_property.php');


    if (!isset($_SESSION['username'])) {
        die(header('Location: ../index.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie | Add Property</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php draw_header(); ?>
        <section id="add_property">
            <form action="../actions/action_add_property.php" method="post">
                <label>Title<input type="text" name="title" placeholder="Title" required></label>
                <label>Price per night<input type="number" name="price_night" placeholder="25" required></label>
                <label>City<input type="text" name="city" placeholder="Porto" required></label>
                <label>Adress<input type="text" name="address" placeholder="Rua Dr. Roberto Frias, 4200-465 Porto" required></label>
                <label>Description<textarea name="description" rows="5" cols="50" placeholder="Tell us a little bit about your place..." required></textarea></label>
                <label>Capacity<input type="number" name="capacity" placeholder="4"  required></label>
                <input type="submit" value="Add Property">
            </form>
        </section>
        <?php draw_footer(); ?>
    </body>
</html>