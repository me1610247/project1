<?php
    include 'inc/header.php';
    include 'inc/nav.php';
    include "core/functions.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read and sanitize the username and password from the form
        $email=sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
    
        // Open the CSV file
        $file = fopen('handlers/user.csv', 'r');
    
        // Iterate through the CSV file to find a match
        while (($row = fgetcsv($file)) !== false) {
            $csvEmail = $row[2];
            $csvPassword=$row[4];
    
            // If the username and password match, redirect to a success page
            if ($email===$csvEmail&& $password === $csvPassword) {
                $_SESSION['auth']=[$email,$password];
                fclose($file);
                header('Location: home.php');
                exit();
            }
        }
    
        // Close the CSV file
        fclose($file);
    
        // If no match is found, display an error message
        $errorMessage = 'Invalid username or password';
    }
?>

<div class="container">
    <div class="row">
        <div class="col-5 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Login</h2> 
            <?php if (isset($errorMessage)): ?>
        <p class="alert alert-danger"><?php echo $errorMessage; ?></p>
        <?php else:
            unset($errorMessage);
            ?>
    <?php endif; ?>
 <form action="" method="POST" class="border p-2">
                
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