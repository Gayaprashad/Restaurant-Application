<?php
  require 'config/config.php';
  require 'config/db.php';
  session_start();
  $type = $_SESSION['type'];
  $c_name =$_SESSION['name'];
  if (strcmp($type,"customer")==0){
    // selects all the data from temp_order
    $sql= "SELECT * FROM temp_order ";

    $result= mysqli_query($conn,$sql);

    $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //var_dump($emp);
    var_dump($orders);
    mysqli_free_result($result);

    foreach ($orders as $order){
      // inserts the data from temp_order one by one into cur_order
      $item=$order['item'];
      $restaurant =$order['restaurant'];
      $nvorv =$order['nvorv'];
      $price =$order['price'];
      print($item);
      if($item){
        $query ="INSERT INTO cur_order (item,restaurant,nvorv,customer,price) values ('$item','$restaurant','$nvorv','$c_name',$price)";
        if(mysqli_query($conn,$query)){
          echo "executed";
          // header('Location:'.path.'');
        }else{
          echo"error".mysqli_error($conn);
        }
      }
    }
    //deletes all the data from temp_order
    $query ="DELETE FROM temp_order";

    if(mysqli_query($conn,$query)){
      header('LOCATION:'.path.'/list.php');
    }else{
      echo 'error :'.mysqli_error($conn);
    }

    mysqli_close($conn);

  }else{
    header('Location:/internshala/c_login.php');
  }
 ?>
