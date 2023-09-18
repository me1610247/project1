<?php
    include 'inc/header.php';
    include 'inc/nav.php';
?>

<div class="container">
    <div class="row">
        <div class="col-5 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Login</h2> 
            <?php
            if(isset($_SESSION['errors'])):
            foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error ;?>
                </div>
            <?php 
        endforeach;
        unset($_SESSION['errors']);
    endif;
        ?>      
        <form action="handlers/handleLogin.php" method="POST" class="border p-2">
                
                <div class="form-group p-3 my-2">
                    <label for="name">Name :</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group p-3 my-2">
                    <label for="email">Email :</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-3 my-2">
                    <label for="password">password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                
                <br>
                <div class="form-group p-5 my-5">
                    <input type="submit" value="Login" class="form-control btn btn-danger active">
                </div>
            </form>
        </div>
    </div>
</div>