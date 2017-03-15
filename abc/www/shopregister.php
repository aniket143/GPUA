<?php
include('connection.php');
 header("Access-Control-Allow-Origin:*");
date_default_timezone_set("Asia/Calcutta");
$current_date = date("Y-m-d H:i:s");
$shopname=$_POST['shopname'];
$ownername=$_POST['ownername'];
$addres=$_POST['addres'];
$mobno=$_POST['mobno'];
$panno=$_POST['panno'];
$vatno=$_POST['vatno'];
$pinno=$_POST['pinno'];
$cstno=$_POST['cstno'];
$shpdes=$_POST['shpdes'];

//echo $memberId;

$sql1="INSERT INTO `shopregister`(`id`, `shopname`, `ownername`, `addres`, `pinno`, `mobno`, `panno`, `vatno`, `cstno`, `shpdes`) VALUES ('','$shopname','$ownername','$addres',$pinno,$mobno,'$panno','$vatno','$cstno','$shpdes')";
//$sql1="SELECT count(`bill_num`) as sr_no FROM `BILL_DETAIL_MSG` where user='$shop_id'";
$res1=mysql_query($sql1) or die("error: " . mysql_error());
echo "Data Inserted";
?>
