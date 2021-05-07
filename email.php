 <?php
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");
if($con!=TRUE){
echo "Error1: ".mysql_error()."<br>";
} 

$sendername=$_POST['sendername']; 
$email=$_POST['email']; 
$message=$_POST['message'];



require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'yashjaiswal@karunya.edu.in';          // SMTP username
$mail->Password = 'KarunyaMailMY'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('no-reply@eyevee.com', 'no-reply@eyevee.com');
$mail->addReplyTo($email);
$mail->addAddress('eyeveeinfo@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '
<h1>Message From '.$email.'</h1><br>
<h1>'.$message.'</h1><br><br>';
$bodyContent .= '';

$mail->Subject = 'Message from '.$email.' ';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	
}

echo "<script>alert('Message Sent!');
        window.location = 'index.html';
            </script>";

?>


