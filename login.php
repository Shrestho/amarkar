<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>

<?php
if(isset($_POST["Submit"])){
  $Username = mysqli_real_escape_string($connection,$_POST["UserName"]);
  $Password = mysqli_real_escape_string($connection,$_POST["Password"]);
  date_default_timezone_set("Asia/Dhaka");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin="Shrestho";
  if(empty($Username) || empty($Password)){
    $_SESSION["ErrorMessaage"]= "Field Must be filled out";
    Redirect_to("Login.php");
  }else {
    $Found_Account=Login_attempt($Username,$Password);
    $_SESSION["id"]=$Found_Account["id"];
    $_SESSION["username"]=$Found_Account["username"];
    if ($Found_Account) {
      $_SESSION["SuccessMessaage"]="Log In Successfully";
      Redirect_to("dashboard.php");
    }else {
      $_SESSION["ErrorMessaage"]= "Wrong Id or Password. Try Again";
      Redirect_to("Login.php");
    }
  }

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login/registration:</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script  src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/adminstyle.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- from w3school -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

<div class="container-fluid">
<div class="row">
  <div class="col-sm-offset-4 col-sm-4" >
    <div >
      <?php echo Message(); echo SuccessMessaage(); ?>
    </div>
    <br>
    <h1>Admin Log In</h1>
    <form class="" action="Login.php" method="post">
      <fieldset>
        <div class="form-group">
        <label for="UserName">ID</label>
        <input class="form-control" type="text" name="UserName" id="UserName" value="" placeholder="UserName">
      </div> <br>
      <div class="form-group">
      <label for="Password">Password</label>
      <input class="form-control" type="Password" name="Password" id="Password" value="" placeholder="Password">
    </div> <br>
      <input class="btn btn-success btn-block" type="submit" name="Submit" value="Log In">
      </fieldset>

    </form>

  </div><!-- ending main area -->
</div><!-- ending row -->
</div><!-- container-fluid -->

  </body>
</html>
