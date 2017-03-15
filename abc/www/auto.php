<?php
//echo "hiii";
    $temp = $_GET['username'];
    $temp2 = $_GET['pass'];
    $a = $_GET['a'];
   // echo "first--".$temp."<br>";
  //  echo "secound--".$temp2;
 // echo $a;
  if($a=='shop')
  {
  $con = mysqli_connect('localhost','root','samarth@123','shopwareho');
	//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopwareho');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"shopwareho");
$sql="SELECT * FROM `inv_tiredup_shop_registration`  WHERE `s_code`='$temp' and `password`='$temp2'";
//echo $sql;
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
while($res = mysqli_fetch_array($result)) {


$fname=$res['shop_name'];
$pwd=$res['password'];
$code=$res['s_code'];
  
}
echo $fname."|".$code;
}
else
{echo "Please Enter Correct Username or Password";}
mysqli_close($con);
  
  }
  else 
  
  {
   $con = mysqli_connect('localhost','root','samarth@123','shopwareho');
//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopwareho');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"shopwareho");
$sql="SELECT * FROM `inv_shop_registration`  WHERE `s_code`='$temp' and `password`='$temp2'";
//echo $sql;
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
while($res = mysqli_fetch_array($result)) {


$fname=$res['Landmark'];
$pwd=$res['password'];
$code=$res['s_code'];
//$code=$res['s_code'];
  
}
echo $fname."|".$code;
}
{echo "Please Enter Correct Username or Password";}
mysqli_close($con);

  
  
  }  
 /* 
//$con = mysqli_connect('localhost','sbit_user','KTv*[{gDgQs$','shopnetwr');
$con = mysqli_connect('localhost','root','samarth@123','guruprasad');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"guruprasad");
//$sql="SELECT * FROM `member_registration`  WHERE `memberId=`='$memberId1' and `password`='$pwd'";
$sql="SELECT m.*,l.* FROM member_registration m inner join login l WHERE m.memberId=l.memberId and l.memberId='$temp' and l.password='$temp2'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
while($res = mysqli_fetch_array($result)) {


$fname=$res['MobileNo'];
$pwd=$res['password'];
$member=$res['memberId'];
$name=$res['name'];
//$code=$res['s_code'];
  
}
echo $name."|".$pwd."|".$member;

}
else {
echo "Please enter correct username and password!!!";

}
mysqli_close($con);*/
?>
