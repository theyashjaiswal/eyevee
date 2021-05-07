<?php
session_start();

 if(empty($_SESSION['name']))
    {

echo "<script> window.location = 'login.html';</script>";  
    }

$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");



$otp = rand(10000,999999);

$bookingid=$_POST['bid'];
$_SESSION['bookingid'] = $bookingid;

$query = "SELECT hodemail,mobileno from booking WHERE bookingid='$bookingid'";
$result=mysqli_query($con,$query); 
$results=mysqli_fetch_array($result);
$mobile=$results['mobileno'];
$_SESSION['mobileno']=$mobile;
$hodemail=$results['hodemail'];

$query2="insert into confirmationstatus(mobileno,otp,hodemail,bookingid) values('".$mobile."','".$otp."','".$hodemail."','".$bookingid."')";

$result=mysqli_query($con,$query2); 




/*Send SMS using PHP*/    
    
 /*   //Your authentication key
    $authKey = "206128AF9oSZ99p6k5ab9dd74";
   
    //Multiple mobiles numbers separated by comma
    $mobileNumber = "7989434283";
    
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "EYEVEE";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode("$otp");
    
    //Define route 
    $route = "route4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    */

$url="http://api.msg91.com/api/sendotp.php?authkey=206128AF9oSZ99p6k5ab9dd74&mobile=$mobile&message=Your%20otp%20is%20$otp&sender=EYEVEE&otp=$otp";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
//CURLOPT_POST => true,
//CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
curl_close($ch);

echo "<script> window.location = 'otpconfirmation.php';</script>";    
?>

