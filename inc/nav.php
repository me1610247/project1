<div class="my-5 p-4">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >PHP PROJECT</a>
    </div>
    <ul class="nav navbar-nav">
    <li class=""><a href="contact.php">Contact us</a></li>
    <?php if(isset($_SESSION['auth'])):?>
      <li class=""><a href="home.php">Home</a></li>
      <li class=""><a href="Admin.php">Admin</a></li>
      <?php endif;?>
        <?php if(!isset($_SESSION['auth'])&&(!isset($_SESSION['autho']))):?>
      <li><a href="login.php">Login</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php" class="btn btn-light active "><span class="glyphicon glyphicon-user"></span> Register</a></li>
    <?php else :?>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="logout.php" class="btn active"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        <?php endif;?>
    </ul>
  </div>
</nav>
</div>