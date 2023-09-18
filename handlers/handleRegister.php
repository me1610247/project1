<?php
session_start();
include "../core/functions.php";
include "../core/validations.php";
$errors=[];
if(checkRequestMethod("POST")&&checkPostInput('name')){
  foreach($_POST as $key => $value){
    $$key =sanitizeInput($value);
  }
  
}
else
echo "not supported method";
if(!requiredVal($name)){
   $errors[]=  "Name is required";
}elseif(!minVal($name,3)){
    $errors[]= "name must be greater than or equal 3 chars";
}elseif(!maxVal($name,25)){
    $errors[]= "name must be smaller than or equal 25 chars";
}
if(!requiredVal($password)){
   $errors[]=  "Password is required";
}elseif(!minVal($password,6)){
    $errors[]= "Password must be greater than or equal 6 chars";
}elseif(!maxVal($password,25)){
    $errors[]= "Password must be smaller than or equal 25 chars";
}
if(!requiredVal($email)){
   $errors[]=  "E-mail is required";
}elseif(!mailVal($email)){
    $errors[]= "Please fill a valid mail";
}
if(confirmation($password,$confirmpassword)){
    $errors[]= "Password Doesn't match";
}
if(empty($errors)){
    $user_file=fopen("user.csv","a+");
    $data=[$name,$email,sha1($password),uniqid($id)];
    fputcsv($user_file,$data);
    $_SESSION['auth']=[$name,$email,uniqid($id)];
    redirect("../profile.php");
}else{
    $_SESSION['errors']=$errors;
    header("location:../register.php");
    die;
}