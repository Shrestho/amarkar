<?php
session_start();
function Message(){
  if (isset($_SESSION["ErrorMessaage"])) {
    $Output="<div class=\"alert alert-danger\"> ";
    $Output.=htmlentities($_SESSION["ErrorMessaage"]);
    $Output.="</div>";
    $_SESSION["ErrorMessaage"]=null;
    return $Output;
  }
}
function SuccessMessaage(){
  if (isset($_SESSION["SuccessMessaage"])) {
    $Output="<div class=\"alert alert-success\"> ";
    $Output.=htmlentities($_SESSION["SuccessMessaage"]);
    $Output.="</div>";
    $_SESSION["SuccessMessaage"]=null;
    return $Output;
  }
}
 ?>
