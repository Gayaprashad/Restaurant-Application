<?php
  require 'config/config.php';
  require 'config/db.php';
  session_start();
  $type=$_SESSION['type'];
  $name=$_SESSION['name'];
  // The IF statement checks if the user is of type restaurant if not he is directed to restaurant login
  if(strcmp($type,"restaurant")!=0){
    header("Location:/internshala/r_login.php");
  }
  $sql= "SELECT * FROM cur_order where restaurant = '$name'";

  $result= mysqli_query($conn,$sql);

  $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
  
  mysqli_free_result($result);

  mysqli_close($conn);
?>
<?php include 'inc/header.php'; ?>
  <div class="container">
    <h1>Orders at present:</h1>
    <hr>
    <table class="table table-striped">
      <thead>
        <th class="col-sm-3">Item</td>
        <th class="col-sm-3">Non veg or veg</td>
        <th class="col-sm-3">Restaurant</td>
        <th class="col-sm-3">Customer</td>
      </thead>
      <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <td class="col-sm-3"><?php echo $order['item'] ?></td>
          <td class="col-sm-3"><?php echo $order['nvorv'] ?></td>
          <td class="col-sm-3"><?php echo $order['restaurant'] ?></td>
          <td class="col-sm-3"><?php echo $order['customer'] ?></td>
          <td class ="col-sm-3"> <a class="btn btn-primary" href="rem_order.php?id=<?php echo $order['id'];?>">Fulfilled</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
