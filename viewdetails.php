<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
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
              <?php
                                    global $ConnectingDB;
                                      $PostIDFromURL=$_GET["id"];
                                    $ViewQuery="SELECT * FROM admin_panel WHERE id='$PostIDFromURL' ";
                                    $Execute=mysqli_query($connection,$ViewQuery);
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
               ?>
               <div class="blogpost thumbnail">
                 <div class="caption">

<div >
  <?php echo Message(); echo SuccessMessaage(); ?>
</div>

                   <h1 id="heading"><?php echo htmlentities($name).' এর ট্যাক্সের তথ্য' ?></h1>
                   <p class="">
                     <b>Holding Number: </b><?php echo htmlentities($holdingnumber) ?></br>
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
                   <a href="payment.php?id=<?php echo $Id ?>" >
                   <span class="btn btn-primary">ট্যাক্স পরিশোধ করুন</span></a>
                 </div>
               </div>
<br>
              <?php } ?>

            </div>
        </header>



        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-4 text-lg-left">
                    Design & Developed By <a style="color:#ff0f11; text-align: center;" href="http://bongoogle.com/about/">Shaishab Das</a>
                  </div>
>
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
