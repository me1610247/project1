<?php
    include 'inc/header.php';
    include 'inc/nav.php';
    session_start();
    include 'core/functions.php';
    session_destroy();
    redirect("login.php");
    die;
