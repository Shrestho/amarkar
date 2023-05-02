<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php confirm_login(); ?>

<?php
if(isset($_POST["Submit"])){

  $name= mysqli_real_escape_string($connection,$_POST["name"]);
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

    global $ConnectingDB;
    $DeleteFromURL=$_GET['Delete'];
    $Query="DELETE FROM admin_panel WHERE id='$DeleteFromURL'";
    $Execute=mysqli_query($connection,$Query);
    if ($Execute) {
      $_SESSION["SuccessMessaage"]="Deleted";
      Redirect_to("dashboard.php");
    }else {
      $_SESSION["ErrorMessaage"]="failed to Delete";
      Redirect_to("DashBoard.php");
    }


}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Tax Information</title>
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
    <h1>Delete Tax Information:</h1>
<?php
$searchQueryParameter=$_GET['Delete'];
$ConnectingDB;
$Query="SELECT * FROM admin_panel WHERE id='$searchQueryParameter'";
$ExecuteQuery=mysqli_query($connection,$Query);
while ($DataRows=mysqli_fetch_array($ExecuteQuery)) {
  $nametoupdate=$DataRows["name"];
  $phonetoupdate=$DataRows["phone"];
  $addresstoupdate=$DataRows["address"];
  $fatherhusbandtoupdate=$DataRows["fatherhusband"];
  $occupationtoupate=$DataRows["occupation"];
  $tubewelltoupdate=$DataRows["tubewell"];
  $latrinetoupdate=$DataRows["latrine"];
  $housepatterntoupate=$DataRows["housepattern"];
  $roomnumbertoupate=$DataRows["roomnumber"];
  $squarefeettoupdate=$DataRows["squarefeet"];
  $amounttoupdate=$DataRows["amount"];
  $paidtoupdate=$DataRows["paid"];
  $fiscalyearupdate=$DataRows["fiscalyear"];
}

 ?>
 <form class="" action="DeletePost.php?Delete=<?php echo $searchQueryParameter; ?>" method="post" enctype="multipart/form-data">
   <fieldset>
     <div class="form-group">
     <label for="name"><span class="FieldInfo">Name</span></label>
     <input disabled  class="form-control" type="text" name="name" id="name" value="<?php echo $nametoupdate; ?>" placeholder="Name">
   </div> <br>
     <div class="form-group">
     <label for="Phone"><span class="FieldInfo">Phone</span></label>
     <input disabled  class="form-control" type="text" name="phone" id="phone" value="<?php echo $phonetoupdate; ?>" placeholder="Phone">
   </div> <br>
     <div class="form-group">
     <label for="address"><span class="FieldInfo">Address</span></label>
     <input disabled  class="form-control" type="text" name="address" id="address" value="<?php echo $addresstoupdate; ?>" placeholder="Address">
   </div> <br>
     <div class="form-group">
     <label for="fatherhusband"><span class="FieldInfo">Father/Husband	</span></label>
     <input disabled  class="form-control" type="text" name="fatherhusband" id="fatherhusband" value="<?php echo $fatherhusbandtoupdate; ?>" placeholder="fatherhusband">
   </div> <br>
     <div class="form-group">
     <label for="occupation"><span class="FieldInfo">Occupation</span></label>
     <input disabled  class="form-control" type="text" name="occupation" id="occupation" value="<?php echo $occupationtoupate; ?>" placeholder="occupation">
   </div> <br>
     <div class="form-group">
     <label for="tubewell"><span class="FieldInfo">tubewell</span></label>
     <input disabled  class="form-control" type="text" name="tubewell" id="tubewell" value="<?php echo $tubewelltoupdate; ?>" placeholder="tubewell">
   </div> <br>
     <div class="form-group">
     <label for="latrine"><span class="FieldInfo">latrine</span></label>
     <input disabled  class="form-control" type="text" name="latrine" id="latrine" value="<?php echo $latrinetoupdate; ?>" placeholder="latrine">
   </div> <br>
     <div class="form-group">
     <label for="housepattern"><span class="FieldInfo">housepattern</span></label>
     <input disabled  class="form-control" type="text" name="housepattern" id="housepattern" value="<?php echo $housepatterntoupate; ?>" placeholder="housepattern">
   </div> <br>
     <div class="form-group">
     <label for="roomnumber"><span class="FieldInfo">roomnumber</span></label>
     <input disabled  class="form-control" type="text" name="roomnumber" id="roomnumber" value="<?php echo $roomnumbertoupate; ?>" placeholder="roomnumber">
   </div> <br>
     <div class="form-group">
     <label for="squarefeet"><span class="FieldInfo">squarefeet</span></label>
     <input disabled  class="form-control" type="text" name="squarefeet" id="squarefeet" value="<?php echo $squarefeettoupdate; ?>" placeholder="squarefeet">
   </div> <br>
     <div class="form-group">
     <label for="amount"><span class="FieldInfo">amount</span></label>
     <input disabled  class="form-control" type="text" name="amount" id="amount" value="<?php echo $amounttoupdate; ?>" placeholder="amount">
   </div> <br>
     <div class="form-group">
     <label for="paid"><span class="FieldInfo">paid</span></label>
     <input disabled  class="form-control" type="text" name="paid" id="paid" value="<?php echo $paidtoupdate; ?>" placeholder="paid">
   </div> <br>
     <div class="form-group">
     <label for="fiscalyear"><span class="FieldInfo">fiscalyear</span></label>
     <input disabled  class="form-control" type="text" name="fiscalyear" id="fiscalyear" value="<?php echo $fiscalyearupdate; ?>" placeholder="fiscalyear">
   </div> <br>


   <input class="btn btn-success btn-block" type="submit" name="Submit" value="Delete">
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
