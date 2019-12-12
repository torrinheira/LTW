<?php

    include_once('../includes/session.php');
    include_once('../debug/debug.php');
    include_once('../database/db_property.php');
    include_once('../templates/tpl_common.php');
    include_once('../includes/redirect.php');


    $username = $_SESSION['username'];

    if ($username == null) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Please log in to continue.');
        die(header('Location: ../pages/login.php'));
    }

    
    

    $property_id = $_GET['id'];

    $info = get_property_info($property_id);
    if($username != $info['owner']){
        die(redirect('error', 'you cannot edit other user property'));
    }
    $property_info = get_property_info($property_id);

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Place Genie</title>
        <meta charset="utf-8"></meta>

        <link href="../css/common.css" rel="stylesheet">
        <script src="../javascript/messages.js" type="module" defer></script>

    </head>

    <body> 
        <?php draw_header(); ?>
        <section id = "edit_property">
            <form action="../actions/action_edit_property.php" method="post">
                <label>  <input type="hidden" id="id_property" name="id_property" value="<?=$property_info['id']?>"> </label>
                <label>Title<input type="text" name="new_title" value="<?=$property_info['title']?>" required></label>
                <label>Price per night<input type="number" name="new_price" value="<?=$property_info['price']?>" min="0" required></label>
                <label>City<input type="text" name="new_city" value="<?= $property_info['city']?>" required></label>
                <label>Address<input type="text" name="new_address" value="<?= $property_info['address']?>" required></label>
                <label>Description
                    <textarea name="new_description" rows="5" cols="50" placeholder="Tell us a little bit about yourself..."><?php 
                    if ($property_info['description'] != null)
                        echo $property_info['description'];
                    ?></textarea>
                </label>
                <label>Capacity<input type="number" name="new_capacity" value="<?=$property_info['capacity']?>" min="1" max="20" required></label>
                <input type="submit" value="Update property">
            </form>
        </section>
        <?php draw_footer(); ?>
    </body>

</html>