<?php

    include_once('../database/user.php');

    $username = $_POST['username'];
    $password = $_POST['password'];



    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION["ERROR"] = "Username can only contain letters(upper/lower case) and numbers";
    die(header('Location: ../pages/signup.html')); //.html ou .php (not sure)
    }

    if($username && $password){
        
    }
    else{
        header('Location: ../pages/signup.html'); //se der erro redirecionar novamente para signup page
        $_SESSION["ERROR"] = "You must fill Username and Password.";
    }


?>