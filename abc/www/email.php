<?php
header("Access-Control-Allow-Origin:*");
if(isset($_GET['address'])){
  //  $to = "priyankag@sbitinfo.in,info@shopnearn.co.in"; // this is your Email address
    $to = "info@shopnearn.co.in"; // this is your Email address
    $from = $_GET['address']; // this is the sender's Email address
    $name = $_GET['name'];
    $subject = "Contact Us-".$_GET['name'];
    $subject2 = "Contact Us-".$_GET['name'];
    $message = $_GET['enquiry'];
    $message2 = "" . $_GET['enquiry'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Thank You...!!We Will Contact You Shortly...!!";

    }
?>
