<?php
session_start();

if(isset($_POST['submit'])){
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");

if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
    
    echo "eroorrrrr";
}
        
if(!empty($_POST['studentid'])) {


$studentid=$_POST['studentid'];
$studentname=$_POST['studentname'];
    
$serialnumberbooking= $_SESSION['sss'];
$name=$_SESSION['name'];    
       
$offerbyindustry= $_SESSION['offeruploadedbyindustry']; 
  
$bookingid=$_SESSION['bookingidnum'];  
  
$institutionname=$_SESSION['institutionname']; 
    
$query="insert into studentdetails(bookingid,institutionname,studentid,studentname,appliedby,forindustry,industryserialnumber) values('".$bookingid."','".$institutionname."','".$studentid."','".$studentname."','".$name."','".$offerbyindustry."','".$serialnumberbooking."')";
$result=mysqli_query($con,$query);  
    
       
if($result!=true){
    echo "Error2: ".mysqli_error($con)."<br>"; 
}
else
{
  header("refresh:0;url=idform.php" );

echo "<script>window.location = 'idform.php';</script>";
    
      }

    }
}

?>
  
 


 
