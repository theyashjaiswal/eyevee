 <?php
session_start();
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");

$bookingid=$_SESSION['bookingidtiredbro'];

$query="SELECT hodemail from booking WHERE bookingid='$bookingid' ";
$result=mysqli_query($con,$query); 
$results=mysqli_fetch_array($result);
$_SESSION['hodemail']=$results['hodemail'];



$query1="SELECT otp from confirmationstatus WHERE bookingid='$bookingid' ";
$result1=mysqli_query($con,$query1); 
$results1=mysqli_fetch_array($result1);
$otp=$results1['otp'];

if($con!=TRUE){
echo "Error1: ".mysql_error()."<br>";
} 
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'eyeveeinfo@gmail.com';          // SMTP username
$mail->Password = 'eyeveeeyevee'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('eyeveeinfo@gmail.com', 'eyeVee');
$mail->addReplyTo('eyeveeinfo@gmail.com', 'eyeVee');
$mail->addAddress($_SESSION['hodemail']);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->addAttachment('PDF/INDUSTRIAL VISIT BOOKING DETAILS.pdf','INDUSTRIAL VISIT BOOKING DETAILS.pdf','base64','application/pdf');


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3>Respected HOD,</h3>

                                           This is regarding an Industrial Visit
                                            offer that students from your Institution are interested in and have applied for the same through our website. Hereby, we have also attached the details of the Industrial visit and as well as the students that have opted for it.
                                            <br><br>
<h3>
<b>Please confirm your approval by clicking <a href="https://eyeveeinfo.000webhostapp.com/BootstrapAdmin/hodverification.php?bookingid='.$bookingid.'&otp='.$otp.'">HERE</a> !!!<b> 
    
<br> <br>

Thank You :)

</h3>
';
$bodyContent .= '';

$mail->Subject = 'HOD Approval for Industrial Visit ';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
   echo "<script>alert('ERROR!! CHECK HOD EMAIL'); window.location = 'register.html'; </script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   
echo "<script>alert('EMAIL SENT TO HOD'); window.location='bookingconfirmation.php'; </script>";
}


?>


