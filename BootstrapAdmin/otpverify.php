<?php
session_start();
 if(empty($_SESSION['name']))
    {
echo "<script>
  window.location = 'login.html';
</script>";
    }
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");

if($con!=TRUE){
echo "Error1";
} 
$mobileno=$_SESSION['mobileno'];
$bookingid=$_SESSION['bookingid'];
$_SESSION['bookingidtiredbro']=$bookingid;


$query="SELECT otp from confirmationstatus WHERE bookingid='$bookingid' AND otpconfirmationstatus='0' ";
$result=mysqli_query($con,$query); 
$results=mysqli_fetch_array($result);
$otp=$results['otp'];

if($otp==$_POST['otp'] )
{
$enteredotp = $_POST['otp']; // Set OTP


$query="UPDATE confirmationstatus SET otpconfirmationstatus='1' WHERE bookingid='$bookingid' AND  otpconfirmationstatus='0' ";
$result=mysqli_query($con,$query); 
    
echo "<script>alert('OTP VERIFIED'); window.location = 'pdfgenerator.php'; </script>";
}
else{
echo "<script>alert('INVALID OTP!!!');window.location = 'otpconfirmation.php';</script>";
}
?>
