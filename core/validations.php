<?php

function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;
}
function minVal($input,$length){
    if(strlen($input)<$length){
        return false;
    }
    return true;
}
function maxVal($input,$length){
    if(strlen($input)>$length){
        return false;
    }
    return true;
}
function mailVal($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
function confirmation($password,$confirmpassword){
 if(!strcmp($password,$confirmpassword)){
    return false;
 }   
 return true;
}
function validData($email,$password){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read and sanitize the username and password from the form
        $email=sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
    
        // Open the CSV file
        $file = fopen('user.csv', 'r');
        // Iterate through the CSV file to find a match
        while (($row = fgetcsv($file)) !== false) {
            $csvEmail = $row[1];
             $csvPassword=$row[2];
    
            // If the username and password match, redirect to a success page
            if ($email === $csvEmail && $password === $csvPassword) {
                exit();
            }
        }
    
        // Close the CSV file
    
        // If no match is found, display an error message
    }
}