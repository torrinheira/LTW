<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../templates/tpl_common.php');


if (!isset($_SESSION['username'])) {
    die(redirect_login('error', 'Please log in to list your property.'));
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Place Genie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/add_property.css" rel="stylesheet">

    <script src="../javascript/messages.js" type="module" defer></script>
</head>

<body>
    <?php draw_header(); ?>

    <section id="add_property">
        <form action="../actions/action_add_property.php" method="post">
            <div class="form_entry p_title">Title<input type="text" name="title" placeholder="Apartment by the river Douro" required></div>
            <div class="form_entry p_city">City<input type="text" name="city" placeholder="Porto" required></div>
            <div class="form_entry p_address">Address<input type="text" name="address" placeholder="Rua da Ribeira Negra, Porto 4050-321, Portugal" required></div>
            <div class="form_entry p_price">Price per night<input type="number" name="price" placeholder="35" min="0" required></div>
            <div class="form_entry p_capacity">Capacity<input type="number" name="capacity" value="1" min="1" max="20" required></div>
            <div class="form_entry p_description">Description<textarea name="description" rows="5" cols="50" placeholder="Tell us a little bit about your place..."></textarea></div>
            <div class="form_entry submit"><input type="submit" value="Add Property"></div>
        </form>
    </section>
    
</body>

</html>
