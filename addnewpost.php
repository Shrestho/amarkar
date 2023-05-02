<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php confirm_login(); ?>

<?php
if(isset($_POST["Submit"])){

  $name= mysqli_real_escape_string($connection,$_POST["name"]);
  $holdingnumber= mysqli_real_escape_string($connection,$_POST["holdingnumber"]);
  $phone = mysqli_real_escape_string($connection,$_POST["phone"]);
  $address = mysqli_real_escape_string($connection,$_POST["address"]);
  $fatherhusband = mysqli_real_escape_string($connection,$_POST["fatherhusband"]);
  $occupation = mysqli_real_escape_string($connection,$_POST["occupation"]);
  $tubewell = mysqli_real_escape_string($connection,$_POST["tubewell"]);
  $latrine = mysqli_real_escape_string($connection,$_POST["latrine"]);
  $housepattern = mysqli_real_escape_string($connection,$_POST["housepattern"]);
  $roomnumber = mysqli_real_escape_string($connection,$_POST["roomnumber"]);
  $squarefeet = mysqli_real_escape_string($connection,$_POST["squarefeet"]);
  $amount = mysqli_real_escape_string($connection,$_POST["amount"]);
  $paid = mysqli_real_escape_string($connection,$_POST["paid"]);
  $fiscalyear = mysqli_real_escape_string($connection,$_POST["fiscalyear"]);
  $ward = mysqli_real_escape_string($connection,$_POST["ward"]);
  $up="Baraitali";
  // date_default_timezone_set("Asia/Dhaka");
  // $CurrentTime=time();
  // $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  // $DateTime;


  if(empty($name)){
    $_SESSION["ErrorMessaage"]= "Name can not be empty";
    Redirect_to("addnewpost.php");
  }elseif (strlen($name)<2){
    $_SESSION["ErrorMessaage"]= " Name is too short";
    Redirect_to("addnewpost.php");
  } else {
    global $ConnectingDB;
    $Query="INSERT INTO admin_panel(holdingnumber,name,phone,address,fatherhusband,occupation,tubewell,latrine,housepattern,roomnumber,squarefeet,amount,paid,fiscalyear,ward,up)
    VALUES('$holdingnumber','$name','$phone','$address','$fatherhusband','$occupation','$tubewell','$latrine','$housepattern','$roomnumber','$squarefeet','$amount','$paid','$fiscalyear','$ward','$up')";
    $Execute=mysqli_query($connection,$Query);
    if ($Execute) {
      $_SESSION["SuccessMessaage"]="New Post Added";
      Redirect_to("addnewpost.php");
    }else {
      $_SESSION["ErrorMessaage"]="post failed to add";
      Redirect_to("addnewpost.php");
    }
  }

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Post</title>
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
    <h1>UP Tax</h1>
    <ul id="Side_Menu" class="nav nav-pills nav-stacked">
      <li > <a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp; DashBoard</a> </li>
      <li class="active"> <a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"> </span>&nbsp;  Add New post</a> </li>
      <!-- <li> <a href="admin.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Manage Admin</a ></li> -->
      <li> <a href="pendingpayment.php"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Pending Payment </a> </li>
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log out</a> </li>
    </ul>
  </div>
  <!-- ending of side area -->
  <div class="col-sm-10">
    <div >
      <?php echo Message(); echo SuccessMessaage(); ?>
    </div>
    <h1>Add new post:</h1>
<form class="" action="addnewpost.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
    <label for="holdingnumber"><span class="FieldInfo">Holding Number</span></label>
    <input class="form-control" type="text" name="holdingnumber" id="holdingnumber" value="" placeholder="holdingnumber">
  </div> <br>
    <div class="form-group">
    <label for="name"><span class="FieldInfo">Name</span></label>
    <input class="form-control" type="text" name="name" id="name" value="" placeholder="Name">
  </div> <br>
    <div class="form-group">
    <label for="Phone"><span class="FieldInfo">Phone</span></label>
    <input class="form-control" type="text" name="phone" id="phone" value="" placeholder="Phone">
  </div> <br>
    <div class="form-group">
    <label for="address"><span class="FieldInfo">Address</span></label>
    <input class="form-control" type="text" name="address" id="address" value="" placeholder="Address">
  </div> <br>
    <div class="form-group">
    <label for="fatherhusband"><span class="FieldInfo">Father/Husband	</span></label>
    <input class="form-control" type="text" name="fatherhusband" id="fatherhusband" value="" placeholder="fatherhusband">
  </div> <br>
    <div class="form-group">
    <label for="occupation"><span class="FieldInfo">Occupation</span></label>
    <input class="form-control" type="text" name="occupation" id="occupation" value="" placeholder="occupation">
  </div> <br>
    <div class="form-group">
    <label for="tubewell"><span class="FieldInfo">tubewell</span></label>
    <input class="form-control" type="text" name="tubewell" id="tubewell" value="" placeholder="tubewell">
  </div> <br>
    <div class="form-group">
    <label for="latrine"><span class="FieldInfo">latrine</span></label>
    <input class="form-control" type="text" name="latrine" id="latrine" value="" placeholder="latrine">
  </div> <br>
    <div class="form-group">
    <label for="housepattern"><span class="FieldInfo">housepattern</span></label>
    <select class="form-control" id="housepattern" name="housepattern">
      <option value="কাচাঁ">কাচাঁ</option>
      <option value="পাকা">পাকা</option>
      <option value="সেমি-পাকা">সেমি-পাকা</option>
    </select>
  </div> <br>
    <div class="form-group">
    <label for="roomnumber"><span class="FieldInfo">roomnumber</span></label>
    <input class="form-control" type="text" name="roomnumber" id="roomnumber" value="" placeholder="roomnumber">
  </div> <br>
    <div class="form-group">
    <label for="squarefeet"><span class="FieldInfo">squarefeet</span></label>
    <input class="form-control" type="text" name="squarefeet" id="squarefeet" value="" placeholder="squarefeet">
  </div> <br>
    <div class="form-group">
    <label for="amount"><span class="FieldInfo">amount</span></label>
    <input class="form-control" type="text" name="amount" id="amount" value="" placeholder="amount">
  </div> <br>
  <div class="form-group">
  <label for="ward"><span class="FieldInfo">Ward Number:</span></label>
  <select class="form-control" id="ward" name="ward">
    <?php
    global $ConnectingDB;
    $viewQuery="SELECT * FROM ward;";
    $Execute=mysqli_query($connection,$viewQuery);
    while ($DataRows=mysqli_fetch_array($Execute)) {
      $id=$DataRows["id"];
      $number=$DataRows["no"];
     ?>
     <option> <?php echo $number; ?></option>
   <?php } ?>
  </select>
</div> <br>
<!-- <div class="form-group">
<label for="union"><span class="FieldInfo">Union</span></label>
<input class="form-control" type="text" name="union" id="union" value="" placeholder="union">
</div> <br> -->
  <div class="form-group">
  <label for="paid"><span class="FieldInfo">Paid Status:</span></label>
  <select class="form-control" id="paid" name="paid">
    <?php
    global $ConnectingDB;
    $viewQuery="SELECT * FROM paidstatus;";
    $Execute=mysqli_query($connection,$viewQuery);
    while ($DataRows=mysqli_fetch_array($Execute)) {
      $id=$DataRows["id"];
      $status=$DataRows["status"];
     ?>
     <option> <?php echo $status; ?></option>
   <?php } ?>
  </select>
</div> <br>
    <div class="form-group">
    <label for="fiscalyear"><span class="FieldInfo">fiscalyear</span></label>
    <input class="form-control" type="text" name="fiscalyear" id="fiscalyear" value="" placeholder="fiscalyear">
  </div> <br>


  <input class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Post">
  </fieldset>

</form>



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
