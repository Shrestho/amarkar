<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php confirm_login(); ?>

<?php
if(isset($_POST["Submit"])){
  $Username = mysqli_real_escape_string($connection,$_POST["UserName"]);
  $Password = mysqli_real_escape_string($connection,$_POST["Password"]);
  $ConfirmPassword = mysqli_real_escape_string($connection,$_POST["ConfirmPassword"]);
  date_default_timezone_set("Asia/Dhaka");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  $Admin="Shrestho";
  if(empty($Username) || empty($Password) || empty($ConfirmPassword)){
    $_SESSION["ErrorMessaage"]= "Field Must be filled out";
    Redirect_to("admin.php");
  }elseif (strlen($Password)<4){
    $_SESSION["ErrorMessaage"]= "At least 4 character";
    Redirect_to("admin.php");
  }elseif ($Password!==$ConfirmPassword){
    $_SESSION["ErrorMessaage"]= "Password Not Match";
    Redirect_to("admin.php");
  }
   else {
    global $ConnectingDB;
    $Query="INSERT INTO registration(datetime,username,password,addedby)
    VALUES('$DateTime','$Username','$Password','$Admin')";
    $Execute=mysqli_query($connection,$Query);
    if ($Execute) {
      $_SESSION["SuccessMessaage"]="Admin Added";
      Redirect_to("admin.php");
    }else {
      $_SESSION["ErrorMessaage"]="failed to add";
      Redirect_to("Admin.php");
    }
  }

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Admin</title>
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
  <div class="col-sm-2">
    <h1>Shrestho</h1>
    <ul id="Side_Menu" class="nav nav-pills nav-stacked">
      <li class="active"> <a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp; DashBoard</a> </li>
      <li> <a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"> </span>&nbsp;  Add New post</a> </li>
      <!-- <li> <a href="admin.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Manage Admin</a ></li> -->
      <li> <a href="pendingpayment.php" target="_blank"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Pending Payment </a> </li>
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log out</a> </li>
    </ul>
  </div>
  <!-- ending of side area -->
  <div class="col-sm-10">
    <div >
      <?php echo Message(); echo SuccessMessaage(); ?>
    </div>
    <h1>Manage Admin:</h1>
<form class="" action="admin.php" method="post">
  <fieldset>
    <div class="form-group">
    <label for="UserName"></label>
    <input class="form-control" type="text" name="UserName" id="UserName" value="" placeholder="UserName">
  </div> <br>
  <div class="form-group">
  <label for="Password"></label>
  <input class="form-control" type="Password" name="Password" id="Password" value="" placeholder="Password">
</div> <br>
  <div class="form-group">
    <label for="ConfirmPassword"></label>
    <input class="form-control" type="Password" name="ConfirmPassword" id="ConfirmPassword" value="" placeholder="Retype Password">
  </div> <br>
  <input class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Admin">
  </fieldset>

</form>
<div class="table-responsive">
  <table class="table table-hover">
    <tr>
      <th>Sr No:</th>
      <th>date & time:</th>
      <th>Admin Name::</th>
      <th>Added By:</th>
      <th>Action</th>
    </tr>
    <?php
    global $ConnectingDB;
    $viewQuery="SELECT * FROM registration ORDER BY datetime desc";
    $Execute=mysqli_query($connection,$viewQuery);
    $Srno=0;
    while ($DataRows=mysqli_fetch_array($Execute)) {
      $id=$DataRows["id"];
      $DateTime=$DataRows["datetime"];
      $Username=$DataRows["username"];
      $Admin=$DataRows["addedby"];
      $Srno++;

     ?>
    <tr>
      <td><?php echo $Srno; ?></td>
      <td><?php echo $DateTime; ?></td>
      <td><?php echo $Username ?></td>
      <td><?php echo $Admin ?></td>
  <td>
<a href="DeleteAdmin.php?id=<?php echo $id ?>">
  <span class="btn btn-danger">Delete</span>
</a>
  </td>
    </tr>
  <?php } ?>
  </table>
</div>

  </div><!-- ending main area -->
</div><!-- ending row -->
</div><!-- container-fluid -->
<div id="Footer">
 <hr><p>Shaishab Das <br> &trade; All copyright reserved.</p>
</div>

<!-- jscript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
