<?php
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $_GET['email']; // Set email variable
    $hash =$_GET['hash'];


$search = "SELECT email, hash, active FROM login WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
$match  =mysqli_query($con,$search);
if($match > 0){
 $query="UPDATE login SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
 $result=mysqli_query($con,$query); 
       
echo "<script>alert('Verified Successfully!!'); window.location='BootstrapAdmin/login.html'; </script>";    
}
    
}

else

{
    
   echo "<script>alert('Invalid URL!!!'); window.location='BootstrapAdmin/login.html'; </script>";  
  
}

 echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';

?>
