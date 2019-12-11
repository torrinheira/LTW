<?php

    include_once('../includes/session.php');
    include_once('../templates/tpl_common.php');


    if (!isset($_SESSION['username'])) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to list your property');
        die(header('Location: ../pages/login.php'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Place Genie</title>
        <meta charset="utf-8">

        <link href="../css/common.css" rel="stylesheet">
        <script src="../javascript/messages.js" type="module" defer></script>
    </head>
    <body>
        <?php draw_header(); ?>

        <section id="add_property">
            <form action="../actions/action_add_property.php" method="post">
                <label>Title<input type="text" name="title" placeholder="Apartment by the river Douro" required></label>
                <label>Price per night<input type="number" name="price" placeholder="35" min="0" required></label>
                <label>City<input type="text" name="city" placeholder="Porto" required></label>
                <label>Address<input type="text" name="address" placeholder="Rua da Ribeira Negra, Porto 4050-321, Portugal" required></label>
                <label>Description<textarea name="description" rows="5" cols="50" placeholder="Tell us a little bit about your place..."></textarea></label>
                <label>Capacity<input type="number" name="capacity" value="1" min="1" max="20" required></label>
                <input type="submit" value="Add Property">
            </form>
        </section>

        <?php draw_footer(); ?>

    </body>
</html>