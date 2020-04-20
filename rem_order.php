<?php
  require 'config/config.php';
  require 'config/db.php';
  $id= mysqli_real_escape_string($conn,$_GET['id']);

  $query =" DELETE FROM cur_order WHERE id ={$id}";

  if(mysqli_query($conn,$query)){
    header('LOCATION:'.path.'/order_view.php');
  }else{
    echo 'error :'.mysqli_error($conn);
  }
?>
