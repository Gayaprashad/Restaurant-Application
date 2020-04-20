<?php
  require 'config/config.php';
  session_start();
  $r_name =$_SESSION['name'];
 ?>
<?php include 'inc/header.php' ?>
<div class="container">
    <h1>Welcome <?php echo $r_name?> restaurant</h1>
    <p>You can select the following options.</p>
    <a class ="btn btn-primary"href="item.php">Add Item</a>
    <a class="btn btn-primary" href="order_view.php">orders</a>
</div>

<?php include 'inc/footer.php' ?>
