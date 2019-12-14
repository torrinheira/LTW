<?php

include_once('../includes/session.php');
include_once('../includes/redirect.php');
include_once('../database/db_user.php');
include_once('../database/db_property.php');
include_once('../debug/debug.php');
include_once('../templates/tpl_common.php');
include_once('../templates/tpl_property.php');



if ($_SESSION['username'] == null) {
    die(redirect_login('error', 'Please log in to manage your properties.'));
}

$username = $_SESSION['username'];
$user_properties = get_user_properties($username);
$number_of_properties = count($user_properties);

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

    <ul>
        <?php
        if ($number_of_properties > 0) {
            foreach ($user_properties as $user_property) {
                draw_manage_property($user_property);
            }
        } else {
            draw_no_properties();
        }
        ?>
    </ul>
    <p><a class="button" href="./add_property.php">Add property</a></p>

    <?php draw_footer(); ?>

</body>

</html>