<?php 
if(isset($_COOKIE['username']))
{
header('location:ValidateLogin.php'); 
}
if(isset($_GET['set']))
{
if(isset($_COOKIE['username']))
{
 $username=$_COOKIE['username']; 
 setcookie("username",$username, time()-3600); 
}
else
echo "cookie is not set";
}
?>
