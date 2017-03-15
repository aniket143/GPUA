<?php
include('connection.php');
 header("Access-Control-Allow-Origin:*");
 $shopid=$_POST['shopid'];
 $shptype=$_POST['shtype'];
 
 $user2 = "election";
$apikey2 = "YGTdgtywR68x7PzHzzNh"; 
$senderid2  =  "GPMMPL";

if ($shptype == "tieshop")
{
	$sql= "SELECT password,mob FROM `inv_tiredup_shop_registration` where s_code='$shopid'";
	$resultSet=mysql_query($sql) or die("InsertQuery Failed:".mysql_error());
	$row=mysql_fetch_assoc($resultSet);
              $password=$row['password'];
              $mobile2=$row['mob'];
              $message="Your Password is $password";
}
else
{
	$sql1= "SELECT password,C_mobile FROM `inv_shop_registration` where s_code='$shopid'";
	$resultSet1=mysql_query($sql1) or die("InsertQuery Failed:".mysql_error());
	$row=mysql_fetch_assoc($resultSet1);
              $password=$row['password'];
              $mobile2=$row['C_mobile'];
              $message="Your Password is $password";
	
}

 

$message2 = urlencode($message);
$type2   =  "txt";
$ch2 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user2."&apikey=".$apikey2."&mobile=".$mobile2."&senderid=".$senderid2."&message=".$message2."&type=".$type2.""); 
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $output2 = curl_exec($ch2);      
    curl_close($ch2);        	

echo "Message Send to your Registered Mobile no";
?>
