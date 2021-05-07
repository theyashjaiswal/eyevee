 <?php
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");
if($con!=TRUE){
echo "Error1";
} 



	$login = $_POST['username'];
	$query_login = "SELECT username FROM login WHERE username='$login';";
	$result_login = mysqli_query($con,$query_login);
	$anything_found = mysqli_num_rows($result_login);
	
if($anything_found>0)
		{
	
        echo "<script>alert('USERNAME TAKEN!!! REGISTER AGAIN PLEASE');
        window.location = 'BootstrapAdmin/register.html';
            </script>";
return false;
        }

		else {      
           
     

$username=$_POST['username']; 
$email=$_POST['email']; 
$accounttype=$_POST['accounttype'];
$hash = md5( rand(0,1000) );
$password = rand(10000000,100000000);
//$en_pwd= sha1($password);
$query="insert into login(username,email,accounttype,hash,password) values('".$username."','".$email."','".$accounttype."','".$hash."','".$password."')";
$result=mysqli_query($con,$query);
/*if($result!=true){
echo "Error2: <br>";
    echo $password;
} else
{*/
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
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Thanks for signing up! '.$username.'</h1> <br>Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br>
 
------------------------<BR>
Username: '.$username.'<br>
Password: '.$password.'<br>
------------------------<br><br>
 
Please click this link to activate your account:<br>

https://eyeveeinfo.000webhostapp.com/Verify.php?email='.$email.'&hash='.$hash.'';
$bodyContent .= '';

$mail->Subject = 'Account Verfication';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}

echo "<script>alert('Check your Email for Verfication LINK!!!');
window.location = 'BootstrapAdmin/login.html';</script>";
   }
?>


