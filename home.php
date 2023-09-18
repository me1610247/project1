<?php
    include 'inc/header.php';
    include 'inc/nav.php';
    if(!isset($_SESSION['auth'])){
        header("location:login.php");
        die;
    }
    
?>


<div class="container">
    <div class="row">
    <div class="alert alert-success text-center">
  <strong>Home Page</strong>
</div>
    <div class="jumbotron">
    <h1>Welcome to My PHP PROJECT</h1>
    <p>Instructor :: Fady</p>
    <p>Assisstant : Khalifa</p>
  </div>
        <div class="col-8 mx-auto my-5 border p2">
            <h2 class="border my-2 bg-danger p-2">Name :<?php echo ucwords($_SESSION['auth'][0]); ?></h2>
            <h2 class="border my-2 bg-danger p-2">Email :<?php echo $_SESSION['auth'][1]; ?></h2>
            <h2 class="border my-2 bg-danger p-2">id :<?php echo $_SESSION['auth'][2]; ?></h2>
        </div>
    </div>
</div>