<?php
// connection to database
//database name
$dbhost = "localhost";
$dbname = "mystore";
$dbuname = "root";
$ppass = "12345678";
$con = new mysqli($dbhost,$dbuname,$ppass,$dbname);

// Check connection
if(!$con){
  die("Connection failed: " . mysqli_connect_error());
}
 
?>