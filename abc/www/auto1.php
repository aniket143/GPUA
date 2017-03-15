<?php
 header("Access-Control-Allow-Origin:*");

//echo "hiii";
    $temp = $_GET['username'];
    $user = $_GET['user'];
     //   echo "first--".$temp."<br>";
   
//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopnetwr');
$con = mysqli_connect('localhost','root','samarth@123','shopnetwr');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"shopnetwr");
//$sql="SELECT * FROM `member_registration`  WHERE `memberId=`='$memberId1' and `password`='$pwd'";
$sql="SELECT * FROM member_registration  WHERE  memberId='$temp' or MobileNo='$temp'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
while($res = mysqli_fetch_array($result)) {


$fname=$res['MobileNo'];
//$pwd=$res['password'];
$member=$res['memberId'];
$name=$res['name'];
//$code=$res['s_code'];
  
}
$sql="SELECT count(`bill_num`) as sr_no FROM `BILL_DETAIL_MSG` where user='$user'";
$res=mysqli_query($con,$sql);
while($rw=mysqli_fetch_assoc($res))
{
$Ven_code=$rw['sr_no'];
}
$cnt=$Ven_code+1;

//$V_code1='GTS'.$str1.'-'.$cnt;
$V_code1=$user.'-'.$cnt;
//echo $V_code1;
$e=10;
echo $name."|".$member."|".$V_code1."|".$e;
//echo $name."|".$member;
//echo 1;
}
else {
echo "Please enter correct details!!!";

}
mysqli_close($con);
   
   
   
    ?>
