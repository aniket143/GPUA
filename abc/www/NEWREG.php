<?php
header("Access-Control-Allow-Origin:*");
include("connection.php");
date_default_timezone_set("Asia/Calcutta");
$current_date = date("Y-m-d H:i:s");
$current_date1 = date("Y-m-d");
$year=date("Y");
   //$p="Select count(*) as total from member_registration where DATE(ENTRY)='$current_date'";
  // echo $p;
//  mysql_query($con,"SELECT * FROM Persons");
 $result=mysql_query("select count(*) as total from member_registration where DATE(ENTRY)='$current_date1'") or die("Query Failed:".mysql_error());
   $row=mysql_fetch_assoc($result);
  $totalreg=$row['total'];
   //echo $total;
      $result1=mysql_query("select count(*) as total from member_registration") or die("Query Failed:".mysql_error());
   $row1=mysql_fetch_assoc($result1);
   $total1reg=$row1['total'];
   $result11=mysql_query("select count(*) as total from member_registration") or die("Query Failed:".mysql_error());
   $row11=mysql_fetch_assoc($result11);
   $total11=$row11['total'];
   $result121=mysql_query("Select srNo,Entry  from member_registration") or die("Query Failed:".mysql_error());
//echo  $result11;   
  // $row1121=mysql_fetch_assoc($result11)
    while($row1121=mysql_fetch_assoc($result121))
  {
	 // $i++;
	  //$memberId=$row['memid'];
   $Entry=$row1121['Entry'];
   $Entryreg=date("d/m/Y g:i A",strtotime($Entry));
   
}
     //echo $Entry;

 
//include("connection.php");
  $cnt=0;
  $sql = mysql_query("SELECT * FROM member_point_table  where pointachieve!='Y' and reg_date='$current_date1'");
  //$resultSet=mysql_query($connection,$sql) or die("Query Failed1:".mysql_error());
  while($row=mysql_fetch_assoc($sql))
  {
	 // $i++;
	  $memberId=$row['memid'];
	  $bfrm=$row['bfrm'];
	  $bto=$row['bto'];
	  $id=$row['id'];
	  $sql2=mysql_query("select count(id) as counter from member_point_table where memid='$memberId' and id<=$id");
    
     // $resultSet2=mysql_query($connection,$sql2) or die("Query Failed2:".mysql_error());
	  $rowc=mysql_fetch_assoc($sql2);
	  if($rowc['counter']>1)
       {	 
          $cnt++;
       }
 }	   
 
  $cnt1=0;
  $sql1 = mysql_query("SELECT * FROM member_point_table  where pointachieve!='Y'");
 // $resultSet1=mysql_query($connection,$sql1) or die("Query Failed1:".mysql_error());
  while($row1=mysql_fetch_assoc($sql1))
  {
	 // $i++;
	  $memberId=$row1['memid'];
	  $bfrm=$row1['bfrm'];
	  $bto=$row1['bto'];
	  $id=$row1['id'];
	  $reg_date=$row1['reg_date'];
	  $reg_time=$row1['reg_time'];
	  $sql21=mysql_query("select count(id) as counter from member_point_table where memid='$memberId' and id<=$id");
      //$resultSet21=mysql_query($connection,$sql21) or die("Query Failed2:".mysql_error());
	  $rowc1=mysql_fetch_assoc($sql21);
	  if($rowc1['counter']>1)
       {	 
          $cnt1++;
       }
 }	     
 $resultSett=mysql_query("select * from BILL_DETAIL") or die("MemberList Query Failed:".mysql_error());
while($rowt=mysql_fetch_assoc($resultSett))
{
$last_date=$rowt['datetime'];
$totalamount=mysql_num_rows($resultSett);
	 }
	 $tim = date("Y-m-d h:i:s");
	 $rest = explode(" ",$tim);
	  $resultSett1=mysql_query("select * from BILL_DETAIL where datetime like '$rest[0]%' ") or die("MemberList Query Failed:".mysql_error());
while($rowt1=mysql_fetch_assoc($resultSett1))
{

$totalamount1=mysql_num_rows($resultSett1);
	 }
if($totalamount1=='') 
{
	$totalamount12='0';
	}
	else
	{
	$totalamount12=$totalamount1;
		}
		


 if($last_date=='') {
$last_datepur='NOT FOUND';



}
else {
	$last_datepur=date("d/m/Y h:m:s A", strtotime($last_date));


}


    $result=mysql_query("Select count(*) as total from member_point_table where pointachieve='Y' and DATE(achieve_date)='$current_date1'") or die("Query Failed:".mysql_error());
   $row=mysql_fetch_assoc($result);
   $totalqua=$row['total'];
   
   $result1=mysql_query("Select count(*) as total from member_point_table where pointachieve='Y'") or die("Query Failed:".mysql_error());
   $row1=mysql_fetch_assoc($result1);
   $total1qua=$row1['total'];
   

 $result12111=mysql_query("Select * from member_point_table where pointachieve='Y'") or die("Query Failed:".mysql_error());
//echo  $result11;   
  // $row1121=mysql_fetch_assoc($result11)
    while($row112111=mysql_fetch_assoc($result12111))
  {
	 // $i++;
	  //$memberId=$row['memid'];
   $reg_date11=$row112111['achieve_date'];
  $reg_time122=$row112111['reg_date'];
  $reg_time1122=$row112111['reg_time'];
}

 if($reg_date11=='') {
 	$reg_time122qua='NOT FOUND';
 	

}
else {
	
	$reg_time122qua=date("d/m/Y",strtotime($reg_time122))." ".date("h:i:s A",strtotime($reg_time1122));


}
echo $totalreg."|".$total1reg."|".$Entryreg."|".$totalamount12."|".$totalamount."|".$last_datepur."|".$totalqua."|".$total1qua."|".$reg_time122qua;



?>

