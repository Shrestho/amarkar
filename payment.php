<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
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
  $paynumber = mysqli_real_escape_string($connection,$_POST["paynumber"]);
  $Trxid = mysqli_real_escape_string($connection,$_POST["Trxid"]);
  date_default_timezone_set("Asia/Dhaka");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
  $DateTime;
  if(empty($paynumber)){
    $idFromURL=$_GET['id'];
    $_SESSION["ErrorMessaage"]= "Number can not be empty";
    Redirect_to("payment.php?id=$idFromURL");
  }elseif (empty($Trxid)){
    $idFromURL=$_GET['id'];
    $_SESSION["ErrorMessaage"]= " Trxid can not be empty";
    Redirect_to("payment.php?id=$idFromURL");
  } else {
    global $ConnectingDB;
    $EditFromURL=$_GET['id'];
    $Query="UPDATE admin_panel SET name='$name',phone='$phone',
    address='$address',fatherhusband='$fatherhusband',occupation='$occupation',tubewell='$tubewell',
    latrine='$latrine',housepattern='$housepattern',roomnumber='$roomnumber',squarefeet='$squarefeet',
    amount='$amount',paid='$paid',fiscalyear='$fiscalyear',paynumber='$paynumber',Trxid='$Trxid',paiddate='$DateTime'
    WHERE id='$EditFromURL'";
    $Execute=mysqli_query($connection,$Query);
    if ($Execute) {
      $_SESSION["SuccessMessaage"]="Payment pending to review....";
      Redirect_to("viewdetails.php?id=$EditFromURL");
    }else {
      $_SESSION["ErrorMessaage"]="failed to add";
      Redirect_to("payment.php?id=$EditFromURL");
    }
  }

}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Amar Kar</title>
      <link rel="icon" type="image/x-icon" href="include/pages/assets/img/coin.png" />
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
      <script src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
      <script src="include/pages/js/scripts.js" crossorigin="anonymous"></script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="Include/pages/css/styles.css" rel="stylesheet" />
      <link href="css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="http://amarkar.com/">AmarKar</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
<div class="" style="white-space: pre-wrap;text-align: left;">
  <h3>কিভাবে ট্যাক্স পরিশোধ করবেন:</h3>
  ১। *২৪৭# ডায়াল করুন
  ২। “সেন্ড মানি” সিলেক্ট করুন
  ৩। 01725794373 নাম্বারটি লিখুন
  ৪। আপনার ট্যাক্সের টাকার পরিমাণ টি লিখুন
  ৫। লেনদেনের  রেফারেন্স এ kar লিখুন
  ৬। আপনার বিকাশ পিনটি দিয়ে লেনদেনটি সম্পন্ন করুন
  ৭| ফিরতি SMS থেকে Trxid/Trans ID টি bKash Trxid ঘরে লিখুন
</div>
<img style="height:100%;width:100%" src="img/pay1.png" alt="Amarkar Payment">
<br><br>
<img style="height:100%;width:100%" src="img/pay2.png" alt="Amarkar Payment"><br><br>
<h4>Trxid: </h4>
<img style="height:100%;width:100%" src="img/pay3.png" alt="Amarkar Payment"><br><br>


              <div >
                <?php echo Message(); echo SuccessMessaage(); ?>
              </div>
              <h1>Payment:</h1>
          <?php
          $searchQueryParameter=$_GET['id'];
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
          <form class="" action="payment.php?id=<?php echo $searchQueryParameter; ?>" method="post" enctype="multipart/form-data">
            <fieldset>
              <div hidden class="form-group">
              <label for="name"><span class="FieldInfo">Name</span></label>
              <input   class="form-control" type="text" name="name" id="name" value="<?php echo $nametoupdate; ?>" placeholder="Name">
            </div>
              <div hidden class="form-group">
              <label for="Phone"><span class="FieldInfo">Phone</span></label>
              <input   class="form-control" type="text" name="phone" id="phone" value="<?php echo $phonetoupdate; ?>" placeholder="Phone">
            </div>
              <div hidden class="form-group">
              <label for="address"><span class="FieldInfo">Address</span></label>
              <input   class="form-control" type="text" name="address" id="address" value="<?php echo $addresstoupdate; ?>" placeholder="Address">
            </div>
              <div hidden class="form-group">
              <label for="fatherhusband"><span class="FieldInfo">Father/Husband	</span></label>
              <input   class="form-control" type="text" name="fatherhusband" id="fatherhusband" value="<?php echo $fatherhusbandtoupdate; ?>" placeholder="fatherhusband">
            </div>
              <div hidden class="form-group">
              <label for="occupation"><span class="FieldInfo">Occupation</span></label>
              <input   class="form-control" type="text" name="occupation" id="occupation" value="<?php echo $occupationtoupate; ?>" placeholder="occupation">
            </div>
              <div hidden class="form-group">
              <label for="tubewell"><span class="FieldInfo">tubewell</span></label>
              <input   class="form-control" type="text" name="tubewell" id="tubewell" value="<?php echo $tubewelltoupdate; ?>" placeholder="tubewell">
            </div>
              <div hidden class="form-group">
              <label for="latrine"><span class="FieldInfo">latrine</span></label>
              <input   class="form-control" type="text" name="latrine" id="latrine" value="<?php echo $latrinetoupdate; ?>" placeholder="latrine">
            </div>
              <div hidden class="form-group">
              <label for="housepattern"><span class="FieldInfo">housepattern</span></label>
              <input   class="form-control" type="text" name="housepattern" id="housepattern" value="<?php echo $housepatterntoupate; ?>" placeholder="housepattern">
            </div>
              <div hidden class="form-group">
              <label for="roomnumber"><span class="FieldInfo">roomnumber</span></label>
              <input   class="form-control" type="text" name="roomnumber" id="roomnumber" value="<?php echo $roomnumbertoupate; ?>" placeholder="roomnumber">
            </div>
              <div hidden class="form-group">
              <label for="squarefeet"><span class="FieldInfo">squarefeet</span></label>
              <input   class="form-control" type="text" name="squarefeet" id="squarefeet" value="<?php echo $squarefeettoupdate; ?>" placeholder="squarefeet">
            </div>
            <div hidden class="form-group">
            <label for="amount"><span class="FieldInfo">amount</span></label>
            <input  class="form-control" type="text" name="amount" id="amount" value="<?php echo $amounttoupdate; ?>" placeholder="amount">
          </div> <br>
          <h5><strong>Amount: </strong><?php echo $amounttoupdate; ?></h5>
          <div hidden  class="form-group">
              <span class="FieldInfo">Existing Paid Status:</span>
              <strong><?php echo $paidtoupdate; ?></strong><br>
            <label for="categoryselect"><span class="FieldInfo">Change Paid Status:</span></label>
            <select class="form-control" id="paid" name="paid">
               <option>Pending</option>
            </select>
          </div>
              <div hidden class="form-group">
              <label for="fiscalyear"><span class="FieldInfo">fiscalyear</span></label>
              <input   class="form-control" type="text" name="fiscalyear" id="fiscalyear" value="<?php echo $fiscalyearupdate; ?>" placeholder="fiscalyear">
            </div>
              <div class="form-group">
              <label for="paynumber"><span class="FieldInfo">bKash নাম্বার:</span></label>
              <input   class="form-control" type="text" name="paynumber" id="paynumber"  placeholder="bKash নাম্বার লিখুন">
            </div>
              <div class="form-group">
              <label for="Trxid"><span class="FieldInfo">bKash Trxid</span></label>
              <input   class="form-control" type="text" name="Trxid" id="Trxid"  placeholder="Trxid">
            </div> <br>


            <input class="btn btn-success btn-block" type="submit" name="Submit" value="পরিশোধ করুন">
            </fieldset>

          </form>

</div>
            </div>
        </header>



        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-4 text-lg-left">
                    Design & Developed By <a style="color:#ff0f11; text-align: center;" href="http://bongoogle.com/about/">Shaishab Das</a>
                  </div>

                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
