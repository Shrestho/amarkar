<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php confirm_login(); ?>
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
      <li> <a href="pendingpayment.php"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Pending Payment </a> </li>
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log out</a> </li>
    </ul>
  </div>
  <!-- ending of side area -->
  <div class="col-sm-10">
    <div>  <?php echo Message(); echo  SuccessMessaage();  ?>  </div>

    <h1>Admin DashBoard:</h1>
    <!-- Word -->
    <form action="dashboard.php" class="navbar-form navbar-right" >
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
    </div>
<button class="btn btn-default" name="Searchward">Go</button>
</form>

    <!-- Sreach form -->
    <form action="dashboard.php" class="navbar-form navbar-right" >
<div class="form-group">
<input type="text" class="form-control" placeholder="Search" name="Search">
</div>
<button class="btn btn-default" name="SearchButton">Go</button>

</form>

<div>
  <table class="table table-striped table-hover">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>phone</th>
      <th>address</th>
      <th>father/husband</th>
      <th>occupation</th>
      <th>amount</th>
      <th>paid</th>
      <th>fiscalyear</th>
      <th>Action</th>
      <th>View</th>
    </tr>
    <?php
    if (isset($_GET["SearchButton"])) {
      if(isset($_GET['page'])){
  $page=$_GET['page'];
}else {
  $page=1;
}
$num_per_page=05;
$start_from=($page-1)*05;
  $search=$_GET["Search"];
  $ViewQuery= "SELECT * FROM admin_panel
  WHERE holdingnumber LIKE '%$search%' OR name LIKE '%$search%' OR phone LIKE '%$search%' OR fatherhusband LIKE '%$search%' OR address LIKE '%$search%' limit $start_from,$num_per_page;";
}elseif (isset($_GET["ward"])) {
  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }else {
    $page=1;
  }
  $num_per_page=05;
  $start_from=($page-1)*05;

  $searchward=$_GET["ward"];
  $ViewQuery= "SELECT * FROM admin_panel
  WHERE ward=$searchward limit $start_from,$num_per_page;";
  $searchward=$_GET["ward"];
  $Query= "SELECT count(*) as count FROM admin_panel
  WHERE ward=$searchward ";
  $result=mysqli_query($connection,$Query);
  while ($row=mysqli_fetch_assoc($result)) {
    $total="<br><b><h4>Total House: </b>".$row['count']."</h4>";
    echo $total;
  }
}
else {
$ConnectingDB;
if(isset($_GET['page'])){
  $page=$_GET['page'];
}else {
  $page=1;
}
$num_per_page=05;
$start_from=($page-1)*05;
$ViewQuery="SELECT * FROM admin_panel limit $start_from,$num_per_page;"; }
$Execute=mysqli_query($connection,$ViewQuery);
$SrNo=0;
while ($DataRows=mysqli_fetch_array($Execute)) {
  $Id=$DataRows["id"];
  $holdingnumber=$DataRows["holdingnumber"];
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
  $SrNo++;
     ?>
     <tr>
       <td><?php echo $holdingnumber ?></td>
       <td><?php echo $name ?></td>
       <td><?php echo $phone ?></td>
       <td><?php echo $address ?></td>
       <td><?php echo $fatherhusband ?></td>
       <td><?php echo $occupation ?></td>
       <td><?php echo $amount ?></td>
       <td><?php echo $paid ?></td>
       <td><?php echo $fiscalyear ?></td>
       <td>
  <a href="EditPost.php?Edit=<?php echo $Id ?>">
    <span class="btn btn-warning">Edit</span></a>
  <a href="DeletePost.php?Delete=<?php echo $Id ?>">
    <span class="btn btn-danger">Delete</span></a>
      </td>
      <td>
  <a href="fullpost.php?id=<?php echo $Id ?>" >
  <span class="btn btn-primary">Details</span></td></a>

</tr>
     </tr>
   <?php } ?>
  </table>

</div>
<nav>
  <ul class="pagination pull-left">

    <?php
    if (isset($page)) {
    if ($page>1) {
      ?>
      <li><a href="dashboard.php?page=<?php echo $page-1; ?>">&laquo</a> </li>
    <?php
   }
  }
   ?>
<?php
global $ConnectingDB;
$queryPagination="SELECT COUNT(*) FROM admin_panel";
$ExecutePagination=mysqli_query($connection,$queryPagination);
$RowPagination=mysqli_fetch_array($ExecutePagination);
$totalid=array_shift($RowPagination);
$idperpage=$totalid/5;
// echo $idperpage;
$idperpage=ceil($idperpage);
for ($i=1; $i<=$idperpage; $i++) {
  if ($i==$page) {
    ?>
    <li class="active"><a href="dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php }else { ?>
    <li ><a href="dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

  <?php
}
}
   ?>

   <?php
   if (isset($page)) {
   if ($page+1<=$idperpage) {
     ?>
     <li><a href="dashboard.php?page=<?php echo $page+1; ?>">&raquo</a> </li>
   <?php
  }
 }
  ?>
 </ul>
 </nav>
  </div>
<!-- ending main area -->
</div>
<!-- ending row -->
</div>
<!-- container-fluid -->
<!-- <div id="Footer">
 <hr><p>Designed by Shaishab Das</p>
</div> -->

<!-- jscript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
