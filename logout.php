<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
$_SESSION["id"]=null;
$_SESSION["username"]=null;
session_destroy();
Redirect_to("Login.php");
 ?>
