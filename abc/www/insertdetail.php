<?php 
 include('connection.php');
 header("Access-Control-Allow-Origin:*");
$current_date = date("Y-m-d H:i:s");
$qualify=500;
$customerQualfiyAmount=100;
date_default_timezone_set("Asia/Calcutta");
$memberId=$_POST['memberId'];

$bill_num=$_POST['billno'];

//$amount=$_POST['totamt'];

$totalamount=$_POST['totamt'];
$date=$_POST['date'];	
//$payment=$_POST['payment'];	
$net=$_POST['netamt'];	

$reward_pt=$_POST['reward_pt'];	
//echo $net;
$sms=0;	
$s_code=$_POST['t1'];	
$shop_bill=$_POST['bill'];	
include('warehouse_database.php');
//new update 24 july 16
//$v= substr($s_code,0,3);   
$v= substr($bill_num,0,3);

//echo $memberId."|".$bill_num."|".$amount."|".$totalamount."|".$date."|".$payment."|".$net."|".$sms."|".$s_code."|".$shop_bill;
$ppp="select set_commission as commission from `inv_tiredup_shop_registration` where s_code='$s_code'";
			$ppp1=mysql_query($ppp);
			while($ppp2=mysql_fetch_assoc($ppp1))
			 {
			 	$commission=$ppp2['commission'];
			 }

$tot=($totalamount*$commission)/100;
$tot1=($tot*40)/100;
$tot2=($tot*60)/100;

if($v=='GTS')
{
 include('connection.php');
 
   $sql1="select bill_num as bill_num from BILL_DETAIL_MSG where memberId='$memberId'";
		$result=mysql_query($sql1);
		while($row=mysql_fetch_assoc($result))
		{
			 $bill_num1=$row['bill_num'];
			}
		
			if($bill_num!=$bill_num1)
			{
				 $sql111_new="select memberId from  BILL_DETAIL WHERE memberId='$memberId'";
          
             $resultSet111_new=mysql_query($sql111_new) or die("InsertQuery Failed:".mysql_error());
             if(mysql_num_rows($resultSet111_new)>0)
{
             	
       
}
else {
	$zzznew="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$zzzznew=mysql_query($zzznew);
     	while($zzzzznew=mysql_fetch_assoc($zzzznew))
     	 {
     	 	
     	 	$Mobileznew=$zzzzznew['MobileNo'];
     	 	
}

      
     }
             
             
             $zzznew22="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$zzzznew22=mysql_query($zzznew22);
     	while($zzzzznew22=mysql_fetch_assoc($zzzznew22))
     	 {
     	 	
     	 	$Mobileznew22=$zzzzznew22['MobileNo'];  	 	
       }


 
    

$query="INSERT INTO BILL_DETAIL values('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','','$current_date','tie_up')";

             // mysql_query("INSERT INTO BILL_DETAIL VALUES ('','$client_cd','$Bill_no','$mrp','$Final_total','$customer_price','N','$username','$current_date','shop')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
              mysql_query("INSERT INTO BILL_DETAIL_MSG VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','tie_up','$sms','$tot')" )or die('INSERT INTO BILL_DETAIL_MSG Query Failed: ' .mysql_error());            
              mysql_query("INSERT INTO BILL_DETAIL VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','tie_up')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
              mysql_query("INSERT INTO new_bill VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','tie_up','$shop_bill')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
             mysql_query("INSERT INTO confirm_order VALUES ('','$memberId','$Pt_code','$Pname','$Final_qty','$amount','$totalamount','$tot1','$current_date','$current_date','N','$bill_num','$s_code')" )or die('INSERT INTO final_bill Query Failed: ' .mysql_error());
             mysql_query("INSERT INTO debit_table VALUES ('','$memberId','$totalamount','$reward_pt','','$bill_num','$shop_bill','$net','$s_code')" )or die('INSERT INTO debit_table Failed: ' .mysql_error());
          
 $df=0;
$dv="SELECT amount FROM  member_point_table where memid='$memberId' ORDER BY id DESC LIMIT 1";

$gd=mysql_query($dv) or die("InsertQuery Failed:".mysql_error());
 while($roww=mysql_fetch_assoc($gd))
	{
	 $amtt1=$roww['amount'];
	
	}

if($amtt1>=500)
{
$df=$amtt1-500;	
}
       
     
          
             $sql1="select sum(totalamount) as total,sum(totalpoint) as tpoint from BILL_DETAIL where memberId='$memberId' and qualify='N'";
            // echo $sql1.'<br>';
             $resultSet1=mysql_query($sql1) or die("InsertQuery Failed:".mysql_error());
             $row=mysql_fetch_assoc($resultSet1);
             $totl=$row['total'];
              $z=$totl+$df;
             
             if ($z >=$qualify)
             {
    	$sql4="select  * from BILL_DETAIL where memberId='$memberId' and qualify='N' order by sr_no LIMIT 0,1";
    //	echo $sql4.'<br>';
		$resultSet4=mysql_query($sql4) or die("Query Failed4:".mysql_error());
		$row4=mysql_fetch_assoc($resultSet4);
		
		$sql51="select  * from BILL_DETAIL where memberId='$memberId' and qualify='N' order by sr_no desc LIMIT 0,1";
		    	//echo $sql51.'<br>';
		$resultSet51=mysql_query($sql51) or die("Query Failed5:".mysql_error());
		$row51=mysql_fetch_assoc($resultSet51);
		$rtr="select  max(`sr_no`) as srnoo from BILL_DETAIL";
		$resultrtr=mysql_query($rtr) or die("Query Failed5:".mysql_error());
		while($rowrtr=mysql_fetch_assoc($resultrtr))
		{
			 $srnoo=$rowrtr['srnoo'];
			}
		
		$crd=0;
		$tot=0;
		$dbt=0;
		$less=0;
		$schg=0;
		$gross=0;
		$tds=0;
		$net=0;

	  //  mysql_query("Insert into  member_point_table values('','$memberId','".$row['total']."','".$row['tpoint']."','N','0','','$current_date','$current_date','".$srnoo."','".$srnoo."','','','','','$crd','$tot','$dbt','$less','$schg','$gross','$tds','$net','n')") or die("Member Achieve Point Query Failed:".mysql_error());
	    mysql_query("Insert into  member_point_table values('','$memberId','$z','".$row['tpoint']."','N','0','','$current_date','$current_date','".$row4['sr_no']."','".$row51['sr_no']."','','','','','$crd','$tot','$dbt','$less','$schg','$gross','$tds','$net','n')") or die("Member Achieve Point Query Failed:".mysql_error());





		mysql_query("update confirm_order set qualify='Y' where memberId='$memberId' and qualify='N'") or die("Confirm Order Query Failed:".mysql_error());
		mysql_query("update BILL_DETAIL set qualify='Y' where memberId='$memberId' and qualify='N'") or die("Confirm Order Query Failed:".mysql_error());
          
$abc="SELECT * FROM member_point_table WHERE memid='$memberId' AND pointachieve='N'";
           $abc1=mysql_query($abc);
           if(mysql_num_rows($abc1) > 1)
           {
           	
           	$qqq="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$qqqq=mysql_query($qqq);
     	while($qqqqq=mysql_fetch_assoc($qqqq))
     	 {
     	 	
     	 	$MobileNo123=$qqqqq['MobileNo'];
}



           }    
       $rand=mt_rand();
	   mysql_query("Insert Into fra_bill_det values('','$user','$memberId','$z','','$current_date','$rand','".$bill_num."')") or die("Query Failed6:".mysql_error());
	  $point1=$row["tpoint"];
	  
	  $sql5="select  * from member_point_table where pointachieve='N' order by id LIMIT 0,1";
	  $resultSet5=mysql_query($sql5) or die("Query Failed5:".mysql_error());
	  $row5=mysql_fetch_assoc($resultSet5);
      if(($row5["totalpoint"]+$point1)>=$row5["point"])
		{
			 
}   
}		
else {
	

}
}
else 
{
		echo "Please Enter Another Bill Number.....!!!!";
		window.location.reload();	
	}



/*******************1*********************8*/
$sql55="select  * from member_point_table where pointachieve='N'";
//echo $sql55;
	  $resultSet55=mysql_query($sql55) or die("Query Failed5:".mysql_error());
	  $row55=mysql_fetch_assoc($resultSet55);
      //if(($row5["totalpoint"]+$point1)>=$row5["point"])
      if(mysql_num_rows($resultSet55)>0)
		{
			
			$ppp="select sum(`totalpoint`) as tpoint from `BILL_DETAIL`";
			$ppp1=mysql_query($ppp);
			while($ppp2=mysql_fetch_assoc($ppp1))
			 {
			 	$gsumm=$ppp2['tpoint'];
			 	}
			 	
    //$kkr="SELECT sum(`totalpoint`) as summer FROM member_point_table WHERE `totalpoint`<='$customerQualfiyAmount'";
    $kkr="SELECT sum(`totalpoint`) as summer FROM member_point_table";
    $kkr1=mysql_query($kkr);
    while($kkr2=mysql_fetch_assoc($kkr1))
     {
     	$summer=$kkr2['summer'];
     	}
     				

     				
     	$remainpoint=$gsumm-$summer;
     	if($gsumm > $summer)
     	{ 
     	$nr=$remainpoint / $customerQualfiyAmount;
     	$nr1=explode('.', $nr);
     	$noe=$nr1[0];
     	$k=0;
     	$bbb="SELECT * FROM member_point_table WHERE pointachieve='N' order by id asc";
     	$bbb1=mysql_query($bbb);
     	while($bbb2=mysql_fetch_assoc($bbb1))
     	 {
     	 	$gid=$bbb2['id'];
     	 	$memid=$bbb2['memid'];
     	 	$cdd=$bbb2['crd'];
     	 	
     	 	if($k<$noe)
     	 	{    	 		
     	 		$crds=0;
     	 		

/*  -----------------------lost point entry search -----------------*/
$totalpoint_lost=0;
$all_memid='';
$all_id='';

$rfind="SELECT * FROM point_lost WHERE `status`='L' AND `nstatus`='n'";
$rfind1=mysql_query($rfind) or die('query failed 2'. mysql_error());
while($finder=mysql_fetch_assoc($rfind1))
{
		$memid_lost=$finder['memid'];
		$id_lost=$finder['id'];
				if($all_memid=='')
				{
				$all_memid=$memid_lost;
				$all_id=$id_lost;
				}
				else 
				{
				$all_memid=$all_memid.','.$memid_lost;
				$all_id=$all_id.','.$id_lost;
				}
}     	 		

$find1="SELECT sum(`points`) as points FROM point_lost WHERE `status`='L' AND `nstatus`='n'";
$find2=mysql_query($find1) or die('query failed 2'. mysql_error());
	while($find3=mysql_fetch_assoc($find2))
	{
	$totalpoint_lost=$find3['points'];
	//$memid_lost=$find3['memid'];
	//$id_lost=$find3['id'];
	
	$exe_st="UPDATE `point_lost` SET `nstatus`='y' WHERE `status`='L' AND `nstatus`='n'";
	mysql_query($exe_st);
	
	$find4="INSERT INTO `point_transfer`(`srno`, `memid1`, `memid2`, `mempoint`,`id`,`id1`, `entry`, `user`) VALUES ('','$memid','$all_memid','$totalpoint_lost','$gid','$all_id','$current_date','')";
     	 		mysql_query($find4);
     	 		
	}
     	 		
     	 		
     	 		
/*  -------------------End Of----lost point entry search -----------------*/      	 		
     	 		
		 $zzz="SELECT * FROM member_point_table WHERE `pointachieve`='Y' AND `pt_status`='n' AND id<$gid AND `memid` IN (SELECT `memberId` FROM `member_registration` WHERE `sponsorId`='$memid')";
     	 	$zzz1=mysql_query($zzz);
     	 	if(mysql_num_rows($zzz1)>0)
     	 	{
     	 		while($zzz2=mysql_fetch_assoc($zzz1))
     	 		 {
     	 		 	     	 		 	$idr=$zzz2['id'];
     	 		 	     	 		 	$mmid=$zzz2['memid'];
     	 		 	     	 		 	$dbts=$zzz2['dbt'];
     	 		 	     	 		 	$crds=$crds+$dbts;
     	 		 	     	 		 	
     	 		$rrrr="UPDATE member_point_table SET `pt_status`='y' WHERE id='$idr' AND `memid`='$mmid'";
     	 		mysql_query($rrrr);
     	 		 	}
     	 		 	     	 		 	
     	 		 	}     	 		
     	 		
   
		$tot=$customerQualfiyAmount;
		if($crds!=0)
		{
			$tot=$customerQualfiyAmount+$crds;
			}
			if($cdd!=0)
			{
							$tot=$tot+$cdd;
							$crds=$crds+$cdd;
				}
					if($totalpoint_lost!='')
				{
					$tot=$tot+$totalpoint_lost;
					$crds=$crds+$totalpoint_lost;
				}
				
		$Select_code91="SELECT *  FROM `member_point_table` WHERE  id='$gid'";
		$Select_code_res91=mysql_query($Select_code91) or die ("Query Failed credit.." .mysql_error());
		while($rw91=mysql_fetch_assoc($Select_code_res91))
			{
				$mem=$rw91['memid'];
     	 		 	$abc="SELECT * FROM member_registration WHERE `memberId`='$mem'";
     	 		 	             $abc111=mysql_query($abc) or die("InsertQuery Failed:".mysql_error());
     	 		 	while($row1111=mysql_fetch_assoc($abc111))
             {
             	
             if($row1111['sponsorId']=="0") 
             {
            $dbt=0;
          	}
     	 		else {
						$dbt=round($tot*15/100);
     	 			}
		
}
	}		
	
					//	$dbt=round($tot*25/100);
			
					
			$less=$tot-$dbt;
			$schg=round($less*2/100);
			$gross=$less-$schg;
			$tds=round($gross*10/100);
			$net=$gross-$tds;     	 		
     	 		//echo $net;
      	 		$exe="UPDATE member_point_table SET `pointachieve`='Y',`totalpoint`='$customerQualfiyAmount',`achieve_date`='$current_date',crd='$crds',tot='$tot',dbt='$dbt',less='$less',schg='$schg',gross='$gross',tds='$tds',net='$net' WHERE id='$gid'";
     	 		mysql_query($exe);
     	 		 
     	 $bbb111="SELECT * FROM member_registration WHERE memberId='$memid'";
     	$bbb122=mysql_query($bbb111);
     	while($bbb23=mysql_fetch_assoc($bbb122))
     	 {
     	 	
     	 	$MobileNo=$bbb23['MobileNo'];
     	 	$sponsorId=$bbb23['sponsorId'];
}


    
    
//echo $output;

if($sponsorId !='')
{

$zzz="SELECT * FROM member_registration WHERE memberId='$sponsorId'";
     	$zzzz=mysql_query($zzz);
     	while($zzzzz=mysql_fetch_assoc($zzzz))
     	 {
     	 	
     	 	$Mobilez=$zzzzz['MobileNo'];
     	 	
}


}

     	 		 	
     	 		 	
     	 		 
     	 		 $k++;
     	 		 $gid++;
     	 		}
    
     	 	}
     	 	}
     	 	}

//echo 1;
echo "<h2>Shop Code - ".$s_code."</h2><br><p>Bill no - ".$bill_num."</p><p>Client ID -".$memberId."</p><p>Total Amount -".$totalamount."</p><p>Date-".$date."</p><p>Net Amound -".$net."</p><p>Shop Bill No -".$shop_bill;

}

else 
{
	

include('warehouse_database.php');
$ppp="select shop_name,Address  from `inv_shop_registration` where s_code='$s_code'";
			$ppp1=mysql_query($ppp);
			while($ppp2=mysql_fetch_assoc($ppp1))
			 {
			 	$shop_name=$ppp2['C_name'];
			 	$Address=$ppp2['C_add'];
			 	}


 include('connection.php');
 $sql1="select count(bill_num) as bill_num from BILL_DETAIL_MSG where memberId='$memberId' and bill_num='$bill_num' and user='$s_code'";
//	echo $sql1;
		$result=mysql_query($sql1);
		
		while($row=mysql_fetch_assoc($result))
		{
			 $bill_num1=$row['bill_num'];
		}
		
	//	echo $bill_num1;
		//	if($bill_num!=$bill_num1)
             if($bill_num1 != 0)
			{
					echo 'NO';
					}
					else {
       $sql111_new="select memberId from  BILL_DETAIL WHERE memberId='$memberId'";
          
             $resultSet111_new=mysql_query($sql111_new) or die("InsertQuery Failed:".mysql_error());
             if(mysql_num_rows($resultSet111_new)>0)
{
            	
       
}
else {
	$zzznew="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$zzzznew=mysql_query($zzznew);
     	while($zzzzznew=mysql_fetch_assoc($zzzznew))
     	 {
     	 	
     	 	$Mobileznew=$zzzzznew['MobileNo'];
     	 	
}


            
             }
             
             $zzznew22="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$zzzznew22=mysql_query($zzznew22);
     	while($zzzzznew22=mysql_fetch_assoc($zzzznew22))
     	 {
     	 	
     	 	$Mobileznew22=$zzzzznew22['MobileNo'];  	 	
       }

            
$user19 = "election";
$apikey19 = "YGTdgtywR68x7PzHzzNh"; 
$senderid19  =  "GPMMPL"; 
$mobile19  =  $Mobileznew22; 
//$message19   =  "Welcome to Guruprasad ,GPMMPL. Thank you for  Purchasing With Us ";  

$message19   =  "Welcome to Guruprasad ,GPMMPL. Thank You for purchase  with our tie-up shop
               ".$shop_name."-".$s_code.", ".$Address."  , your purchase amount is
                ".$amount.",your Transaction No. is ".$bill_num." .Check details in your Acccount. ";
                  
$message19 = urlencode($message19);
$type19   =  "txt";
$ch19 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user19."&apikey=".$apikey19."&mobile=".$mobile19."&senderid=".$senderid19."&message=".$message19."&type=".$type19.""); 
    curl_setopt($ch19, CURLOPT_HEADER, 0);
    curl_setopt($ch19, CURLOPT_RETURNTRANSFER, 1);
    $output19 = curl_exec($ch19);      
    curl_close($ch19);

$query="INSERT INTO BILL_DETAIL values('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','','$current_date','tie_up')";

             // mysql_query("INSERT INTO BILL_DETAIL VALUES ('','$client_cd','$Bill_no','$mrp','$Final_total','$customer_price','N','$username','$current_date','shop')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
              mysql_query("INSERT INTO BILL_DETAIL_MSG VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','MOBILE_SHOP','$sms','$commission')" )or die('INSERT INTO BILL_DETAIL_MSG Query Failed: ' .mysql_error());
              mysql_query("INSERT INTO BILL_DETAIL VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','MOBILE_SHOP')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
              mysql_query("INSERT INTO new_bill VALUES ('','$memberId','$bill_num','$amount','$totalamount','$tot1','N','$s_code','$current_date','MOBILE_SHOP','$shop_bill')" )or die('INSERT INTO BILL_DETAIL Query Failed: ' .mysql_error());
             mysql_query("INSERT INTO confirm_order VALUES ('','$memberId','$Pt_code','$Pname','$Final_qty','$amount','$totalamount','$tot1','$current_date','$current_date','N','$bill_num','$s_code')" )or die('INSERT INTO final_bill Query Failed: ' .mysql_error());
			             mysql_query("INSERT INTO debit_table VALUES ('','$memberId','$totalamount','$reward_pt','','$bill_num','$shop_bill','$net','$s_code')" )or die('INSERT INTO debit_table Failed: ' .mysql_error());

$df=0;
$dv="SELECT amount FROM  member_point_table where memid='$memberId' ORDER BY id DESC LIMIT 1";

$gd=mysql_query($dv) or die("InsertQuery Failed:".mysql_error());
 while($roww=mysql_fetch_assoc($gd))
	{
	 $amtt1=$roww['amount'];
	
	}

if($amtt1>=500)
{
$df=$amtt1-500;	
}
       
      
             $sql1="select sum(totalamount) as total,sum(totalpoint) as tpoint from BILL_DETAIL where memberId='$memberId' and qualify='N'";
            // echo $sql1.'<br>';
             $resultSet1=mysql_query($sql1) or die("InsertQuery Failed:".mysql_error());
             $row=mysql_fetch_assoc($resultSet1);
              $totl=$row['total'];
              $z=$totl+$df;
             if ($z >=$qualify)
             {
             	
     $user2 = "election";
$apikey2 = "YGTdgtywR68x7PzHzzNh"; 
$senderid2  =  "GPMMPL"; 
$mobile2  =  $Mobileznew22; 
$message2   =  "You have crossed your monthly 500 Rupees purchase ,
   you are eligible to get Loyalty Cash Back through Guruprasad. 
   Thank you and keep on Shopping,for more details visit your GPMMPL a/c in our  website shopenearn.co.in"; 
$message2 = urlencode($message2);
$type2   =  "txt";
$ch2 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user2."&apikey=".$apikey2."&mobile=".$mobile2."&senderid=".$senderid2."&message=".$message2."&type=".$type2.""); 
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $output2 = curl_exec($ch2);      
    curl_close($ch2);        	
            	
             	
             	
    	$sql4="select  * from BILL_DETAIL where memberId='$memberId' and qualify='N' order by sr_no LIMIT 0,1";
    //	echo $sql4.'<br>';
		$resultSet4=mysql_query($sql4) or die("Query Failed4:".mysql_error());
		$row4=mysql_fetch_assoc($resultSet4);
		
		$sql51="select  * from BILL_DETAIL where memberId='$memberId' and qualify='N' order by sr_no desc LIMIT 0,1";
		    	//echo $sql51.'<br>';
		$resultSet51=mysql_query($sql51) or die("Query Failed5:".mysql_error());
		$row51=mysql_fetch_assoc($resultSet51);
		$rtr="select  max(`sr_no`) as srnoo from BILL_DETAIL";
		$resultrtr=mysql_query($rtr) or die("Query Failed5:".mysql_error());
		while($rowrtr=mysql_fetch_assoc($resultrtr))
		{
			 $srnoo=$rowrtr['srnoo'];
			}
		
		$crd=0;
		$tot=0;
		$dbt=0;
		$less=0;
		$schg=0;
		$gross=0;
		$tds=0;
		$net=0;

	    mysql_query("Insert into  member_point_table values('','$memberId','$z','".$row['tpoint']."','N','0','','$current_date','$current_date','".$row4['sr_no']."','".$row51['sr_no']."','','','','','$crd','$tot','$dbt','$less','$schg','$gross','$tds','$net','n')") or die("Member Achieve Point Query Failed:".mysql_error());
	
	

	
	
	
		mysql_query("update confirm_order set qualify='Y' where memberId='$memberId' and qualify='N'") or die("Confirm Order Query Failed:".mysql_error());
		mysql_query("update BILL_DETAIL set qualify='Y' where memberId='$memberId' and qualify='N'") or die("Confirm Order Query Failed:".mysql_error());
         $abc="SELECT * FROM member_point_table WHERE memid='$memberId' AND pointachieve='N'";
           $abc1=mysql_query($abc);
           if(mysql_num_rows($abc1) > 1)
           {
           	
           	$qqq="SELECT * FROM member_registration WHERE memberId='$memberId'";
     	$qqqq=mysql_query($qqq);
     	while($qqqqq=mysql_fetch_assoc($qqqq))
     	 {
     	 	
     	 	$MobileNo123=$qqqqq['MobileNo'];
}
$user123 = "election";
$apikey123 = "YGTdgtywR68x7PzHzzNh"; 
$senderid123  =  "GPMMPL"; 
$mobile123  =  $MobileNo123; 
$message123   =  "Thank you for Repurchase with GPMMPL, for more details visit your GPMMPL a/c in our  website shopenearn.co.in"; 
$message123 = urlencode($message123);
$type123   =  "txt";
$ch123 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user123."&apikey=".$apikey123."&mobile=".$mobile123."&senderid=".$senderid123."&message=".$message123."&type=".$type123.""); 
    curl_setopt($ch123, CURLOPT_HEADER, 0);
    curl_setopt($ch123, CURLOPT_RETURNTRANSFER, 1);
    $output11 = curl_exec($ch123);      
    curl_close($ch123);
           }   	
       $rand=mt_rand();
	   mysql_query("Insert Into fra_bill_det values('','$user','$memberId','$z','','$current_date','$rand','".$bill_num."')") or die("Query Failed6:".mysql_error());
	  $point1=$row["tpoint"];
	  
	  $sql5="select  * from member_point_table where pointachieve='N' order by id LIMIT 0,1";
	  $resultSet5=mysql_query($sql5) or die("Query Failed5:".mysql_error());
	  $row5=mysql_fetch_assoc($resultSet5);
      if(($row5["totalpoint"]+$point1)>=$row5["point"])
		{
			 
}   
}		
else {
	
$user123 = "election";
$apikey123 = "YGTdgtywR68x7PzHzzNh"; 
$senderid123  =  "GPMMPL"; 
$mobile123  =  $MobileNo123; 
$message123   =  "Thank you for Repurchase with GPMMPL, for more details visit your GPMMPL a/c in our  website shopenearn.co.in"; 
$message123 = urlencode($message123);
$type123   =  "txt";
$ch123 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user123."&apikey=".$apikey123."&mobile=".$mobile123."&senderid=".$senderid123."&message=".$message123."&type=".$type123.""); 
    curl_setopt($ch123, CURLOPT_HEADER, 0);
    curl_setopt($ch123, CURLOPT_RETURNTRANSFER, 1);
    $output11 = curl_exec($ch123);      
    curl_close($ch123);
}


/*******************1*********************8*/

$sql55="select  * from member_point_table where pointachieve='N'";
//echo $sql55;
	  $resultSet55=mysql_query($sql55) or die("Query Failed5:".mysql_error());
	  $row55=mysql_fetch_assoc($resultSet55);
      //if(($row5["totalpoint"]+$point1)>=$row5["point"])
      if(mysql_num_rows($resultSet55)>0)
		{
			
			$ppp="select sum(`totalpoint`) as tpoint from `BILL_DETAIL`";
			$ppp1=mysql_query($ppp);
			while($ppp2=mysql_fetch_assoc($ppp1))
			 {
			 	$gsumm=$ppp2['tpoint'];
			 	}
			 	
    //$kkr="SELECT sum(`totalpoint`) as summer FROM member_point_table WHERE `totalpoint`<=$customerQualfiyAmount";
    $kkr="SELECT sum(`totalpoint`) as summer FROM member_point_table ";
    $kkr1=mysql_query($kkr);
    while($kkr2=mysql_fetch_assoc($kkr1))
     {
     	$summer=$kkr2['summer'];
     	}
     				

     				
     	$remainpoint=$gsumm-$summer;
     	$nr=$remainpoint / $customerQualfiyAmount;
     	$nr1=explode('.', $nr);
     	$noe=$nr1[0];
     	$k=0;
     //	$bbb="SELECT * FROM member_point_table WHERE pointachieve='N'";
     	$bbb="SELECT * FROM member_point_table WHERE pointachieve='N' ORDER BY id ASC";
     	$bbb1=mysql_query($bbb);
     	while($bbb2=mysql_fetch_assoc($bbb1))
     	 {
     	 	$gid=$bbb2['id'];
     	 	$memid=$bbb2['memid'];
     	 	$cdd=$bbb2['crd'];
     	 	
     	 	if($k<$noe)
     	 	{    	 		
     	 		$crds=0;
     	 		
		 $zzz="SELECT * FROM member_point_table WHERE `pointachieve`='Y' AND `pt_status`='n' AND id<$gid AND `memid` IN (SELECT `memberId` FROM `member_registration` WHERE `sponsorId`='$memid')";
     	 	$zzz1=mysql_query($zzz);
     	 	if(mysql_num_rows($zzz1)>0)
     	 	{
     	 		while($zzz2=mysql_fetch_assoc($zzz1))
     	 		 {
     	 		 	     	 		 	$idr=$zzz2['id'];
     	 		 	     	 		 	$mmid=$zzz2['memid'];
     	 		 	     	 		 	$dbts=$zzz2['dbt'];
     	 		 	     	 		 	$crds=$crds+$dbts;
     	 		 	     	 		 	
     	 		$rrrr="UPDATE member_point_table SET `pt_status`='y' WHERE id='$idr' AND `memid`='$mmid'";
     	 		mysql_query($rrrr);
     	 		 	}
     	 		 	     	 		 	
     	 		 	}     	 		
     	 		
   
		$tot=$customerQualfiyAmount;
		if($crds!=0)
		{
			$tot=$customerQualfiyAmount+$crds;
			}
			if($cdd!=0)
			{
							$tot=$tot+$cdd;
							$crds=$crds+$cdd;
				}
		$Select_code91="SELECT *  FROM `member_point_table` WHERE  id='$gid'";
		$Select_code_res91=mysql_query($Select_code91) or die ("Query Failed credit.." .mysql_error());
		while($rw91=mysql_fetch_assoc($Select_code_res91))
			{
				$mem=$rw91['memid'];
     	 		 	$abc="SELECT * FROM member_registration WHERE `memberId`='$mem'";
     	 		 	             $abc111=mysql_query($abc) or die("InsertQuery Failed:".mysql_error());
     	 		 	while($row1111=mysql_fetch_assoc($abc111))
             {
             	
             if($row1111['sponsorId']=="0") 
             {
            $dbt=0;
          	}
     	 		else {
						$dbt=round($tot*15/100);
     	 			}
		
}
	}		
	
					//	$dbt=round($tot*25/100);
			
					
			$less=$tot-$dbt;
			$schg=round($less*2/100);
			$gross=$less-$schg;
			$tds=round($gross*10/100);
			$net=$gross-$tds;     	 		
     	 		
      	 		$exe="UPDATE member_point_table SET `pointachieve`='Y',`totalpoint`='$customerQualfiyAmount',`achieve_date`='$current_date',crd='$crds',tot='$tot',dbt='$dbt',less='$less',schg='$schg',gross='$gross',tds='$tds',net='$net' WHERE id='$gid'";
     	 		mysql_query($exe);
     	 		 
     	 
     	 		 	    	 $bbb111="SELECT * FROM member_registration WHERE memberId='$memid'";
     	$bbb122=mysql_query($bbb111);
     	while($bbb23=mysql_fetch_assoc($bbb122))
     	 {
     	 	
     	 	$MobileNo=$bbb23['MobileNo'];
     	 	$sponsorId=$bbb23['sponsorId'];
}

$user = "election";
$apikey = "YGTdgtywR68x7PzHzzNh"; 
$senderid  =  "GPMMPL"; 
$mobile  =  $MobileNo; 
$message   =  "Congratulation you had qualified for cashback with GPMMPL shopenearn.co.in , cash back amount ".$gross.",
for more details visit your GPMMPL a/c in our  website shopenearn.co.in"; 
$message = urlencode($message);
$type   =  "txt";
$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);      
    curl_close($ch); 
//echo $output;



if($sponsorId !='')
{

$zzz="SELECT * FROM member_registration WHERE memberId='$sponsorId'";
     	$zzzz=mysql_query($zzz);
     	while($zzzzz=mysql_fetch_assoc($zzzz))
     	 {
     	 	
     	 	$Mobilez=$zzzzz['MobileNo'];
     	 	
}

$user1 = "election";
$apikey1 = "YGTdgtywR68x7PzHzzNh"; 
$senderid1  =  "GPMMPL"; 
$mobile1  =  $Mobilez; 
$message1   =  "Congratulation Your  Referral  Customer ID No. ".$memid." had qualified  for cash back with GPMMPL , cash back amount ".$gross.", for more details visit your GPMMPL a/c in our  website shopenearn.co.in";  
$message1 = urlencode($message1);
$type1   =  "txt";
$ch1 = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user1."&apikey=".$apikey1."&mobile=".$mobile1."&senderid=".$senderid1."&message=".$message1."&type=".$type1.""); 
    curl_setopt($ch1, CURLOPT_HEADER, 0);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
    $output1 = curl_exec($ch1);      
    curl_close($ch1);
}
     	 		 	
     	 		 
     	 		 $k++;
     	 		 $gid++;
     	 		}
    
     	 	}
     	 	}
}

	
	//ani
	echo "<h2>Shop Code - ".$s_code."</h2><br><p>Bill no - ".$bill_num."</p><p>Client ID -".$memberId."</p><p>Total Amount -".$totalamount."</p><p>Date-".$date."</p><p>Net Amound -".$net."</p><p>Shop Bill No -".$shop_bill;

}	
 ?>
