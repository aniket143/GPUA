<?php
include('connection.php');
 header("Access-Control-Allow-Origin:*");
$current_date = date("Y-m-d H:i:s");
$qualify=500;
$customerQualfiyAmount=100;
date_default_timezone_set("Asia/Calcutta");
$memberId=$_POST['memberId'];
$shop_id=$_POST['shopid'];

$str= ltrim ($shop_id, 'T');
$str1=intval($str);  
$sql1="SELECT count(`bill_num`) as sr_no FROM `BILL_DETAIL_MSG` where user='$shop_id'";
$res1=mysql_query($sql1);

	while($resl = mysql_fetch_assoc($res1)) 
	{
$Ven_code=$resl['sr_no'];
}

$cnt=$Ven_code+1;

//$V_code1='GTS'.$str1.'-'.$cnt;
$V_code1=$shop_id.'-'.$cnt;




//echo $memberId;
$sql1="SELECT sum(point) point FROM `credit_table` where memid='$memberId'";
$result1 = mysql_query($sql1)or die ("Query Failed:" .mysql_error());
while($res1 = mysql_fetch_assoc($result1)) 
{
$point=$res1['point'];
  if ($point== '')
  {
	  $point=0;
  }
}
$sql="SELECT * FROM member_registration WHERE memberId='$memberId' and status='Y'";
$result = mysql_query($sql)or die ("Query Failed:" .mysql_error());

//echo $result;
if(mysql_num_rows($result)>0)
{
while($res = mysql_fetch_assoc($result)) 
{
$fname=$res['memberId'];
$pwd=$res['name'];
//$code=$res['s_code'];
  
}
echo $fname."|".$pwd."|".$V_code1."|".$point;
}
else
{
echo 1;	
}

//include('warehouse_database.php');
?>
