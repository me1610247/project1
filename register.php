<?php
    include 'inc/header.php';
    include 'inc/nav.php';
?>

<div class="container">
    <div class="row">
        <div class="col-5 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Register</h2>
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
        <form action="handlers/handleRegister.php" method="POST" class="border p-2">
                <div class=" border form-group p-3 my-2">
                    <label for="fname">First Name :</label>
                    <input type="text" name="fname" class="form-control" id="fname">
                </div>
                <div class=" border form-group p-3 my-2">
                    <label for="lname">Last Name :</label>
                    <input type="text" name="lname" class="form-control" id="lname">
                </div>
                <div class="form-group p-3 my-2">
                    <label for="email">Email :</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-3 my-2">
                    <label for="password">password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group p-3 my-2">
                    <label for="password">confirm password:</label>
                    <input type="password" name="confirmpassword" class="form-control" id="confirmpassword">
                </div>
                <br>
                <div class="form-group p-5 my-5">
                    <input type="submit" value="Register" class="form-control btn btn-danger active">
                </div>
            </form>
        </div>
    </div>
</div>