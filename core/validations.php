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