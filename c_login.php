<?php
  require 'config/config.php';
  require 'config/db.php';
  $unsucc ="";
  $sql= "SELECT * FROM customer";

  $result= mysqli_query($conn,$sql);

  $cust = mysqli_fetch_all($result,MYSQLI_ASSOC);

  $flag=0;// it is acts as the flag while checking if the data is present in the SQL or not
  $final="";//used to store the final name
  $final_pass="";//used to store the final password
  $pass_status=0;//used for validation of password
  $name_status=0;//used for validation of name
  $nlog=$_REQUEST['nlog'];
  if(strcmp($nlog,'1')==0){
    $unsucc="First login as a customer before ordering";
  }
  if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);// stores the input name
    $name=strtolower($name);
    $password=mysqli_real_escape_string($conn,$_POST['password']);//store the input password
    $password =strtolower($password);
    // check the password that is given with the data in the customer database
    foreach( $cust as $custr){
      $c_name= strtolower($custr["name"]);
      $c_pass= strtolower($custr["password"]);
      if ((strcmp($name,$c_name)==0) && (strcmp($password,$c_pass)==0))
      {
        $flag=1;
        $final=$c_name;
        $final_pass=$c_pass;
        echo "executed the correct";
      }
    }
    if($flag ===1){
      echo"Login successful";
      session_start();
      $_SESSION['type']="customer";
      $_SESSION['name']=$final;
      header('Location:/internshala/list.php');
      $pass_status=1;
      $name_status=1;
    }else if ($flag===0){
      $unsucc="Login unsuccessful";

      if(strcmp($final_pass,$password)!=0){
        $pass_status=0;
      }
      if(strcmp($final,$name)!=0){
        $name_status=0;
      }
    }
  }

  mysqli_free_result($result);
  mysqli_close($conn);
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>R- App</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="style/main.css">
   </head>
   <body>
     <?php include 'inc/navbar.php'; ?>
  <div class="container">
    <h1>Enter the login credentials:</h1>
    <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']?>?nlog=0" method="post" id="form">
        <div class="form-group">
          <label>Name:</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <hr>
        <h2> <span id="status"><?php echo $unsucc?></span><h2>
        <hr>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
      </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
