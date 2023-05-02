<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php confirm_login(); ?>
<?php
if (isset($_GET["id"])) {
  $IdFromURL=$_GET["id"];
  $ConnectingDB;
  $Query="UPDATE admin_panel SET paid='Paid' WHERE id='$IdFromURL'";
  $Execute=mysqli_query($connection,$Query);
  if ($Execute) {
    $_SESSION['SuccessMessaage']="Payment Received";
    Redirect_to("pendingpayment.php");
  }else {
    $_SESSION["ErrorMessage"]="Not Receive";
    Redirect_to("pendingpayment.php");
  }
} ?>
