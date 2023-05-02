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
              <h1 style="color:white">আপনার ট্যাক্স পরিশোধ করুন:</h1>
              <form action="index.php" class="navbar-form navbar-right" >
          <div class="form-group">
          <input required type="text" class="form-control" placeholder="হোল্ডিং নাম্বার/নাম/মোবাইল নাম্বার লিখুন" name="Search">
          </div>
          <button class="btn btn-info btn-lg" name="SearchButton">খুঁজুন</button>

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
               <table class="table table-striped table-hover" style="color:white";>
                 <tr>
                   <th>Holding Number</th>
                   <th>Name</th>
                   <th>amount</th>
                   <th>Details</th>
                 </tr>

               <tr>
                 <td><?php echo $holdingnumber ?></td>
                 <td><?php echo $name ?></td>
                 <td><?php echo $amount ?></td>
                <td>
            <a href="viewdetails.php?id=<?php echo $Id ?>" >
            <span style="color:black" class="btn btn-primary">বিস্তারিত দেখুন</span></td></a>

          </tr>
               </tr>
             <?php } }?>
            </table>

            </div>
        </header>



        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">
                      Design & Developed By <a style="color:#ff0f11; text-align: center;" href="http://bongoogle.com/about/">Shaishab Das</a>
                    </div>
                    <!-- <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div> -->
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
