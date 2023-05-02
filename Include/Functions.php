<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}
function Login_attempt( $Username,$Password){
  global $ConnectingDB;
  $Query="SELECT * FROM registration WHERE username='$Username' AND password='$Password' ";
$Execute=mysqli_query(new mysqli("localhost:3306", "amarkarc_Shrestho", "FNceN4xAFq4WvRf",'amarkarc_uptax'),$Query);

if ($Admin=mysqli_fetch_assoc($Execute)) {
  return $Admin;
}else {
  return null;
}

}
function login(){
  if (isset($_SESSION["id"])) {
    return true;
  }
}
function confirm_login(){
  if (!login()) {
    $_SESSION["ErrorMessaage"]= "Log in required";
    Redirect_to("Login.php");
  }
}
 ?>
