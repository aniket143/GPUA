<?php
 header("Access-Control-Allow-Origin:*");

//echo "hiii";
    $clientid = $_GET['clientid'];
    $pass = $_GET['pass'];
     //   echo "first--".$temp."<br>";
   
//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopnetwr');
$con = mysqli_connect('localhost','root','samarth@123','shopnetwr');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"shopnetwr");
$sql="SELECT * FROM `login`  WHERE `memberId`='$clientid' and `password`='$pass'";
//$sql="SELECT * FROM member_registration  WHERE  memberId='$temp' or MobileNo='$temp'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
echo "1";
}
else
 {
echo "Wrong Password !!!";

}
mysqli_close($con);
   
   
   
    ?>
