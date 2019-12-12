<?php
    
    include_once('../includes/session.php');
    include_once('../includes/redirect.php');


    session_destroy();
    session_start();

    die(redirect('success', 'Logged out!'));

?>
