 <?php
 $servername = "localhost:3306";
 $username = "amarkarc_Shrestho";
 $password = "FNceN4xAFq4WvRf";
 $connection = new mysqli($servername, $username, $password,'uptax');

 if ($connection) {
   // echo "connected </br>";
 } else {
   error.mysql_connect();
 }
 $ConnectingDB = mysqli_select_db($connection,'uptax');
 if ($ConnectingDB) {
   // echo "database selected";
 } else {
   error.mysqli_select_db();
 }
 ?>
