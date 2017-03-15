<?php
header("Access-Control-Allow-Origin:*");
include("connection.php");
$codecon=$_POST['codecon'];
date_default_timezone_set("Asia/Calcutta");

$sql = mysql_query("SELECT * FROM `random_assign` where randomno = $codecon");
//echo $sql;
$num_rows = mysql_num_rows($sql);
if($num_rows > 0)
{

while($row=mysql_fetch_assoc($sql))
  {
	 // $i++;
	  $memberId=$row['assignto'];
	}
	echo $memberId;
}
else
{
	echo "1";
	
}
	
?>
