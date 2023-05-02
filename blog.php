<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
<title> Amar Kar</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script  src="js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="css/publicstyles.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>


<body>
        <!-- <div class="header">
          <h1>আমার কর</h1>
         </div> -->
<!-- navbar -->
<div class="">


<?php include('Include/pages/navbar.php') ?>
</div>
 <!-- ending mainmenu -->

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

<?php Include("Include/pages/Carousel.php"); ?>
<iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FBaraitaliCEC%2Fvideos%2F213015293122112%2F&show_text=false&width=560"  style="border:none;overflow:hidden" scrolling="no"  allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>


        <br><br>
       <div class="" style="text-align:center;">
        <p>Designed & Developed By <a href="http://bongoogle.com/about">Shaishab Das</a></p>
        </div>



</body>


</html>
