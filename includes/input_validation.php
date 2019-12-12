<?php

    
    //new function to test input check
    //function that validates the input from users
    function check_input($input){
        if (preg_match ("/^[a-zA-Z0-9\.\_\-\s]+$/", $input)) {
            return true; 
        }
        return false; //returns true if input only contain letters and number, returns false otherwise
    }

    function contains_letter($password){
        if(strcspn($password, 'abcdefghijklmnopqrstuvxzwyABCDEFGHIJKLMNOPQRSTUVXWYZ') + 1){
            return true;
        }

        return false; 
    }

    function contains_number($password){
        if(strcspn($password, '0123456789') + 1){
            return true;
        }

        return false;   
    }


    //function that verfies password
    function check_password($password){

        if(check_input($password) && (strlen($password) > 5)){
            if(contains_letter($password) && contains_number($password)){
                return true; //returns true if password only contains allowed characters, has length bigger than 5 and at minimum has a letter and a number
            }

            return false;
        }

        return false;
    }
?>