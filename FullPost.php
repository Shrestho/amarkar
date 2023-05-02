<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin DashBoard</title>
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
      <li> <a href="pendingpayment.php" ><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Pending Payment </a> </li>
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log out</a> </li>
    </ul>
  </div>
        <div class="maincontent col-sm-10">
            <div class="container">
<?php echo Message(); echo SuccessMessaage(); ?>
              <div class="blog-header">

              </div>
              <div class="row">
                <div class="col-sm-8">
                  <?php
                                        global $ConnectingDB;
                                          $PostIDFromURL=$_GET["id"];
                                        $ViewQuery="SELECT * FROM admin_panel WHERE id='$PostIDFromURL' ";
                                        $Execute=mysqli_query($connection,$ViewQuery);
                                    while ($DataRows=mysqli_fetch_array($Execute)) {
                    $name=$DataRows["name"];
                    $phone=$DataRows["phone"];
                    $address=$DataRows["address"];
                    $fatherhusband=$DataRows["fatherhusband"];
                    $occupation=$DataRows["occupation"];
                    $tubewell=$DataRows["tubewell"];
                    $latrine=$DataRows["latrine"];
                    $housepattern=$DataRows["housepattern"];
                    $roomnumber=$DataRows["roomnumber"];
                    $squarefeet=$DataRows["squarefeet"];
                    $amount=$DataRows["amount"];
                    $paid=$DataRows["paid"];
                    $fiscalyear=$DataRows["fiscalyear"];
                   ?>
                   <div class="blogpost thumbnail">
                     <div class="caption">
                       <h1 id="heading"><?php echo htmlentities($name).'\'s Tex information:' ?></h1>
                       <p class="">
                         <b>Name: </b><?php echo htmlentities($name) ?></br>
                         <b>phone: </b><?php echo htmlentities($phone) ?></br>
                         <b>Address: </b><?php echo htmlentities($address) ?></br>
                         <b>father/husband: </b><?php echo htmlentities($fatherhusband) ?></br>
                         <b>occupation: </b><?php echo htmlentities($occupation) ?></br>
                         <b>tubewell: </b><?php echo htmlentities($tubewell) ?></br>
                         <b>latrine: </b><?php echo htmlentities($latrine) ?></br>
                         <b>housepattern: </b><?php echo htmlentities($housepattern) ?></br>
                         <b>roomnumber: </b><?php echo htmlentities($roomnumber) ?></br>
                         <b>squarefeet: </b><?php echo htmlentities($squarefeet) ?></br>
                         <b>amount: </b><?php echo htmlentities($amount) ?></br>
                         <b>paid Status: </b><?php echo htmlentities($paid) ?></br>
                         <b>fiscalyear: </b><?php echo htmlentities($fiscalyear) ?></br>
                       </p>
                     </div>
                   </div>
<br>
                  <?php } ?>

                </div>
                <!-- ending row -->
                </div>
                <!-- container-fluid -->
                <div id="Footer">
                 <hr><p></p>
                </div>

                <!-- jscript -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                  </body>
                </html>
