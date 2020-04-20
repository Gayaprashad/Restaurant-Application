<?php
  require "config/config.php";
  require "config/db.php";
  session_start();
  $_SESSION['type']="undefined";// resets the session data
  $_SESSION['name']="undefined";//resets the session data
  $query ="DELETE FROM temp_order";

  if(mysqli_query($conn,$query)){
    header('LOCATION:'.path.'');
  }else{
    echo 'error :'.mysqli_error($conn);
  }

  mysqli_close($conn);

  header("Location:".path."");
?>
