<?php
  require 'config/config.php';
  require 'config/db.php';
  session_start();
  $_SESSION['type']="undefined";// the session variables are used to check if the user is Restaurant /customer to validate his login in the Additems, view order,cart pages
  $_SESSION['name']="undefined";
 ?>
<?php include 'inc/header.php' ?>
<div class="container">
    <h1>Welcome To Foodshala</h1>
    <p>You can select the following options.</p>
    <a class ="btn btn-primary"href="registration.php">Registration</a>
    <a class="btn btn-primary" href="login.php">Log in</a>
    <a class="btn btn-primary" href="list.php">Menu</a>
</div>

<?php include 'inc/footer.php' ?>
