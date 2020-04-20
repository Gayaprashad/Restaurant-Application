<?php
  require 'config/config.php';
  require 'config/db.php';
  $unsucc="";// it acts as an error message
  $key =$_REQUEST['key'];// it checks about the phonenumber length
  if($key ==1){
    $unsucc="The mobile number must be 10 digits maximum";
  }else{
    $unsucc="";
  }
  if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $phoneno=mysqli_real_escape_string($conn,$_POST['phoneno']);
    $nvorv=$_POST['nvorv'];
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $ph=(int)$phoneno;
    if ((999999999>$ph) || ($ph >9999999999)){
      header('Location:'.path.'/c_reg.php?key=1');
    }else{
        $query ="INSERT INTO customer (name,address,phoneno,password,nvorv) values ('$name','$address','$phoneno','$password','$nvorv')";

        if(mysqli_query($conn,$query)){
          header('Location:'.path.'');
        }else{
          echo"error".mysqli_error($conn);
        }
    }
  }
?>
 <?php include 'inc/header.php'; ?>
  <div class="container">
    <h1>Enter the customer details:</h1>
    <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="form">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <label>Phone no:</label>
          <input type="text" name="phoneno" id="phoneno" class="form-control">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label>Veg or Non-veg</label>
          <select name="nvorv" >
            <option value="NV">Non Veg</option>
            <option value="V">Vegetarian</option>
          </select>
        </div>
        <h2> <span id="status"><?php echo $unsucc?></span><h2>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
      </form>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="script/validation.js"> </script>
  </html>
