<?php

include_once('../database/user.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
}

if($username && $password){
    login($username, $password);
   
}
else{
    header('Location: ../pages/login.html'); //se der erro redirecionar novamente para signup page
    $_SESSION["ERROR"] = "Username and Password must be field.";
}

$_SESSION['sessionid'] = session_id();

?>