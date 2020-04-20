<?php
//(del): 0- do not delete; 1- delete the entry,(default)- displays just the contents in the table (it is invoked in the navbar)
  require 'config/config.php';
  require 'config/db.php';
  session_start();
  $type=$_SESSION['type'];
  $name =$_SESSION['name'];
  $del =$_REQUEST['del'];
  $default= $_REQUEST['default'];
  // to insert if it is a customer or not
  if(strcmp($type,"customer")!=0){
    header("Location:/internshala/c_login.php?nlog=1");
  }else if (($del!=1)&& ($default!=1)){
    $item=$_REQUEST['item'];
    $nvorv=$_REQUEST['nvorv'];
    if($nvorv =="NV"){
      $nvorv="NV";
    }else{
      $nvorv="V";
    }
    $restaurant =$_REQUEST['restaurant'];
    $price =$_REQUEST['price'];
    $query ="INSERT INTO temp_order (item,nvorv,restaurant,price,customer) values ('$item','$nvorv','$restaurant','$price','$name')";

    if(mysqli_query($conn,$query)){
      // echo("successfully inserted into temp_order");
    }else{
      echo"error".mysqli_error($conn);
    }
  }
  // it checks if the cart is called to delete the file temporary orders table
  if($del ==1){
    $id=$_REQUEST['id'];
    echo $item;
    $query ="DELETE FROM temp_order WHERE id ='{$id}'";

    if(mysqli_query($conn,$query)){
      header('LOCATION:'.path.'/cart.php?default=1&del=0');
    }else{
      echo 'error :'.mysqli_error($conn);
    }
  }
  // it populates the table with data from temp_order
  $sql= "SELECT * FROM temp_order ";

  $result= mysqli_query($conn,$sql);

  $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
  //var_dump($emp);
  mysqli_free_result($result);

  mysqli_close($conn);
  $total_price =0;
  // it calculates the total price
  foreach ($orders as $order){
    $total_price+= $order['price'];
  }
?>
 <?php include 'inc/header.php'; ?>
  <div class="container">
    <h1>Cart</h1>
    <p>Customer: <?php echo ucfirst($name);?></p>
    <hr>
    <table class="table table-striped">
      <thead>
        <th class="col-sm-3">Item name</td>
        <th class="col-sm-3">NV or V</td>
        <th class="col-sm-3">Restaurant</td>
        <th class="col-sm-3">Price</td>
      </thead>
      <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <th scope="row" class="col-sm-3"><?php echo $order['item'] ?></th>
          <td class="col-sm-3"><?php echo $order['nvorv'] ?></td>
          <td class="col-sm-3"><?php echo $order['restaurant'] ?></td>
          <td class="col-sm-3"><?php echo $order['price'] ?></td>
          <td class ="col-sm-3"> <a class="btn btn-primary" href="cart.php?del=1&id=<?php echo $order['id'];?>">Delete</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
    <p> The Total price is : <?php echo $total_price?></p>
    <br>
    <a class="btn btn-primary" href="order.php?">Place order</a>
  </div>
<?php include 'inc/footer.php' ?>
