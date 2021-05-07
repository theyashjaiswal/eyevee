<?php

session_start();
$con= mysqli_connect("localhost", "root","","eyevee");
if($con!=TRUE){
echo "Error1: <br>";
}
$username=$_SESSION['name'];
echo "Change your password here $username"; 
if(!empty($_POST['password'])){ $pass=$_POST['password'];
$en_log_pwd=sha1($pass);
$query="update login set Password='".$en_log_pwd."' where Username='".$username."'";
$result= mysqli_query($query); 
if($result!=TRUE){
echo "FAILED"; }
else {
echo '<script>alert("OK");window.location="login.php"</script>';
} }?>