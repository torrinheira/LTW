<?php

include_once('../database/user.php');

$username = $_POST['username'];
$password = $_POST['password'];

//web browser moves from one website to another and between pages of a website, 
//it can optionally pass the URL it came from. This is called the HTTP_REFERER, 
//and this post looks at how to use this variable with PHP.

//TODO: se estiver a dar bosta aqui tentar usar o HTTP_REFERER ($_SERVER user provavelmente tbm é útil)

if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
$_SESSION["ERROR"] = "Username can only contain letters(upper/lower case) and numbers";
die(header('Location: ../pages/signup.html')); //.html ou .php (not sure)
}

if($username && $password){
    if(!usernameExists($username)){
        if(isPasswordValide($password)){
            addNewUser($username, $password);
        }
        else{
            $_SESSION["ERROR"] = "Password must have at minimum 5 characters, including at leasr 1 number.";
        }
    }
    else{
        $_SESSION["ERROR"] = "Username already taken...";
    }
}
else{
    header('Location: ../pages/signup.html'); //se der erro redirecionar novamente para signup page
    $_SESSION["ERROR"] = "Username and Password must be field.";
}
?>