<?php
header("Access-Control-Allow-Origin:*");
date_default_timezone_set("Asia/Calcutta");

$name=$_GET['name'];
$to=$_GET['to'];
$from=$_GET['from'];
//$today=$_GET['today'];
$today = date("Y-m-d");
//$today1 = date("Y-m-d", strtotime($today));
//echo $today; 
$td=explode('-',$today);
$t1=$td[1];
$t2=$td[2];
$t3=$td[0];
if(strlen($t1)== '1') 
{ 
$t1='0'.$t1;
}
if(strlen($t2)=='1')
{
	$t2='0'.$t2;
	}
$tdate=$t3.'-'.$t1.'-'.$t2;
//$tdate=$today;
//echo $tdate;
//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopnetwr');
$con = mysqli_connect('localhost','root','samarth@123','shopnetwr');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"shopnetwr");
if($to!='' && $from!='') {

$sql="SELECT * FROM `BILL_DETAIL`  WHERE `user`='$name'  and `datetime` BETWEEN  '$from 00:00:01' AND '$to 23:59:59' ";
//echo $sql; 
}
else if($today!='') 
 {
	 $sql="SELECT * FROM `BILL_DETAIL`  WHERE `user`='$name' and `datetime` LIKE '$tdate%' ";
 	}
 	else 
 	{
 	 	$sql="SELECT * FROM `BILL_DETAIL`  WHERE `user`='$name'";
 		}


 $result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0) {
while($res = mysqli_fetch_array($result)) {


$memberId	=$res['memberId'];
 $bill_num=$res['bill_num'];
 $amount=$res['amount'];
 $datetime=$res['datetime'];
 
$sbill="select * from `new_bill` where memberId='$memberId' and bill_num='$bill_num'";
	$ressbill=mysqli_query($con,$sbill) or die("Query Failed1:".mysql_error());
	while($rowsbill=mysqli_fetch_assoc($ressbill))
	{
		$shop_bill_num=$rowsbill['shop_bill_num'];
	}	 
 
  $query="SELECT * FROM `member_registration` WHERE memberId='$memberId'";
  $result1 = mysqli_query($con,$query);

while($res1 = mysqli_fetch_array($result1)) {

?>

<table>
<tr><td><b>	Customer Id.</b></td><td><b>:</b>&nbsp;<?php echo $memberId;?></td></tr>
<tr><td><b>	Customer Name</b></td><td><b>:</b>&nbsp;<?php echo $res1['name'];;?></td></tr>
<tr><td><b>Transaction No</b></td><td><b>:</b>&nbsp;<?php echo $bill_num;?></td></tr>
 <?php if($shop_bill_num!='')
 {?>
<tr><td><b>Bill No</b></td><td><b>:</b>&nbsp;<?php echo $shop_bill_num;?></td></tr>
 <?php }
else
{}?>
<tr><td><b>Bill Amount</b></td><td><b>:</b>&nbsp;<?php echo $amount;?></td></tr>
<tr><td><b>Entry Date</b></td><td><b>:</b>&nbsp;<?php echo $datetime;?></td></tr>
  
</table><hr>
<?php
 }
}
}
else 
{
	echo '<font color="red"><h3>Result Not Found</h3></font>';
	}
mysqli_close($con);
?>
