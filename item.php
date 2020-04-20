<?php
  require 'config/config.php';
  require 'config/db.php';
  session_start();
  $type = $_SESSION['type'];
  $name = $_SESSION['name'];
  // The IF statement checks if the user is of type restaurant if not he is directed to restaurant login
  if(strcmp($type,"restaurant")!=0){
    header("Location:/internshala/r_login.php");
  }
  // The following if statemente is triggered when submit button is triggered . It inserts the item into the menu table.
  if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $nvorv=mysqli_real_escape_string($conn,$_POST['nvorv']);
    $r_name= $_SESSION['name'];
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $query ="INSERT INTO menu (item,nvorv,restaurant,price) values ('$name','$nvorv','$r_name','$price')";

    if(mysqli_query($conn,$query)){
      header('Location:'.path.'/r_redirect.php');
    }else{
      echo"error".mysqli_error($conn);
    }
  }
?>
<?php include 'inc/header.php'; ?>
  <div class="container">
    <h1>Add a dish</h1>
    <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="form">
        <div class="form-group">
          <label>Dish Name:</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label>Veg or Non-veg:</label>
          <select name="nvorv" >
            <option value="NV">Non Veg</option>
            <option value="V">Vegetarian</option>
          </select>
        </div>
        <div class="form-group">
          <label>Price :</label>
          <input type="text" name="price" id="price" class="form-control">
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
      </form>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="script/validation.js"> </script>
  </html>
