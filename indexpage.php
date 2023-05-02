<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Amar Kar</title>
  </head>
  <body>
    <!-- navbar -->
    <div class="nav-navbar">
      <?php include('Include/pages/navbar.php') ?>
    </div>
    <!-- carousel -->
    <!-- <?php Include("Include/pages/Carousel.php"); ?> -->
    <!-- Search -->
    <h1>আপনার ট্যাক্স পরিশোধ করুন:</h1>
    <form action="blog.php" class="navbar-form navbar-right" >
<div class="form-group">
<input required type="text" class="form-control" placeholder="হোল্ডিং নাম্বার/নাম/মোবাইল নাম্বার লিখুন" name="Search">
</div>
<button class="btn btn-default" name="SearchButton">খুঁজুন</button>
</form><br><br>
<?php
if (isset($_GET["SearchButton"])) {
$search=$_GET["Search"];
$ViewQuery= "SELECT * FROM admin_panel
WHERE holdingnumber LIKE '%$search%' OR name LIKE '%$search%' OR phone LIKE '%$search%' OR fatherhusband LIKE '%$search%' OR address LIKE '%$search%' ";

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
 <table class="table table-striped table-hover">
   <tr>
     <th>Holding Number</th>
     <th>Name</th>
     <th>phone</th>
     <th>address</th>
     <th>father/husband</th>
     <th>occupation</th>
     <th>amount</th>
     <th>paid</th>
     <th>fiscalyear</th>
     <th>Details</th>
   </tr>

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
<a href="viewdetails.php?id=<?php echo $Id ?>" >
<span class="btn btn-primary">বিস্তারিত দেখুন</span></td></a>

</tr>
 </tr>
<?php } }?>
</table>
<!-- end Search -->
<!-- sponsor video -->
<iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FBaraitaliCEC%2Fvideos%2F213015293122112%2F&show_text=false&width=560" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
