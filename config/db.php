<?php
  $conn= mysqli_connect('localhost','root','123456','restaurants');

  if(mysqli_connect_errno()){
    echo'failed to connect to MYsql'. mysqli_connect_errno();
  }
  else {
    // echo'connection successful';
  }

 ?>
