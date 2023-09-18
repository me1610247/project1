<?php
session_start();
include "../core/functions.php";
include "../core/validations.php";
$errors=[];
if(checkRequestMethod("POST")&&checkPostInput('email')){
    foreach($_POST as $key => $value){
      $$key =sanitizeInput($value);
    }
    
  }else
  echo "not supported method";

  if(!requiredVal($email)){
    $errors[]=  "E-mail is required";
 }elseif(!mailVal($email)){
     $errors[]= "Please fill a valid mail";
 }
 if(!requiredVal($password)){
    $errors[]=  "Password is required";
 }elseif(!minVal($password,6)){
     $errors[]= "Password must be greater than or equal 6 chars";
 }elseif(!maxVal($password,25)){
     $errors[]= "Password must be smaller than or equal 25 chars";
 }
 $sha1=sha1($_POST['password']);
if(!empty($errors)){
    $_SESSION['errors']=$errors;
    redirect("../login.php");
    die;
}else
redirect("../home.php");
$user_file=fopen("user.csv","a+");
$data=[$name,$email,sha1($password),uniqid($id)];
fputcsv($user_file,$data);
$_SESSION['auth']=[$name,$email,uniqid($id)];