<?php
session_start();
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");

if($con!=TRUE){
echo "Error1: <br>";
}
if(isset($_COOKIE['username']))
{ 
$username=$_COOKIE['username'];
$query="select * from login where Username='".$username."'"; 
}
else
{
$username=$_POST['username']; 
$password=$_POST['password'];
//$en_cr=sha1($password);
$query="select * from login where Username='".$username."' and Password='".$password."' and active='1'";

}

$result=mysqli_query($con,$query); 


if($result!=true)
{
echo "Error2: <br>"; 
}

$records= mysqli_num_rows($result);

if($records!=0)
{
//session_start(); 
if(isset($_POST['remember'])){
setcookie("username",$username); 
}
$_SESSION['name']=$username;
$results=mysqli_fetch_array($result);
$_SESSION['accounttype']=$results['accounttype'];

if($_SESSION['accounttype']=='Institution')
    
{
echo "<script>window.location = 'BootstrapAdmin/instdashboard.php';
</script>";    
}
   
if($_SESSION['accounttype']=='Industry')
    { 
echo "<script>window.location = 'BootstrapAdmin/indusdashboard.php';
</script>"; 
    
    }
    
if($_SESSION['accounttype']=='Admin')
{
echo "<script>window.location = 'BootstrapAdmin/admindashboard.php';
</script>"; 
    
}

}

else{
echo "<script>alert('VERIFICATION PENDING!! or Invalid Credentials!!'); window.location='BootstrapAdmin/login.html'; </script>";
} ?>
