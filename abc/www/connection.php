<?php
error_reporting(E_ALL);
$host = "localhost";
$username = "root";
$password =  "samarth@123";

$databasename = "shopnetwr";

$connection = mysql_pconnect($host,$username, $password) or die("Connection Error");
mysql_select_db($databasename, $connection) or die("The database is Error");
date_default_timezone_set("Asia/Kolkata");


?>

