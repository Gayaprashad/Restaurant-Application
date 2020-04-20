<?php
  require 'config/config.php';
  require 'config/db.php';
  $sql= "SELECT * FROM restaurant";

  $result= mysqli_query($conn,$sql);

  $rest = mysqli_fetch_all($result,MYSQLI_ASSOC);

  $flag=0;// it acts as a flag while checking if the data is present is in SQL or not
  $final ="";
  $final_pass="";//used to store the final password.
  $unsucc="";// It is used to check if there are any unauthorised entry.
  if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $name=strtolower($name);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password =strtolower($password);
    //it checks the input with the data from restaurant database
    foreach( $rest as $restr){
      $r_name= strtolower($restr['Name']);
      $r_pass= strtolower($restr['password']);
      if ((strcmp($name,$r_name)==0) && (strcmp($password,$r_pass)==0))
      {
        $flag=1;
        $final=$r_name;
        $final_pass=$r_pass;
      }
    }
    //checks if the flag is set if so the login is successful
    if($flag ===1){
        echo"Login successful";
        session_start();
        $_SESSION['type']="restaurant";
        $_SESSION['name']=$final;
        header('Location:/internshala/r_redirect.php');
        $pass_status=1;
        $name_status=1;
    }else if ($flag===0)//checks if the flag is set to 0 if so the login is unsuccessful
    {
        $unsucc="Login unsuccessful";
    }
  }
  mysqli_free_result($result);
  mysqli_close($conn);
?>
<?php include 'inc/header.php' ?>
<div class="container">
  <h1>Restaurant Login</h1>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="form">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <input type="submit" name="submit" value="submit" class="btn btn-primary">
      <h2> <span id="status"><?php echo $unsucc;?></span><h2>
    </form>
</div>
<?php include 'inc/footer.php' ?>
