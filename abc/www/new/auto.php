<?php
//echo "hiii";
    $temp = $_GET['username'];
    $temp2 = $_GET['pass'];
   // echo "first--".$temp."<br>";
  //  echo "secound--".$temp2;
  
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
mysqli_close($con);
?>
