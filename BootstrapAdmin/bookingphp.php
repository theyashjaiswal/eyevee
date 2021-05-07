<?php
session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }

if(isset($_POST['submit'])){
    $con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");



if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
        
if(!empty($_POST['city'])) {
$serialnumberbooking= $_SESSION['sss'];
$name=$_SESSION['name'];
$mobileno=$_POST['mobileno'];
$institutionname=$_POST['institutionname'];
    
$_SESSION['institutionname']= $institutionname; 
$institutionaddress=$_POST['institutionaddress'];
$city=$_POST['city'];    
$yearofstudy=$_POST['yearofstudy'];
$hodemail=$_POST['hodemail'];

$offerbyindustry= $_SESSION['offeruploadedbyindustry']; 
  
$bookingid = rand(1000,10000);   
$_SESSION['bookingidnum']=$bookingid;   
$query="insert into booking(serialnumber,offeruploadedbyindustry,name,mobileno,institutionname,institutionaddress,city,yearofstudy,hodemail,bookingid) values('".$serialnumberbooking."','".$offerbyindustry."','".$name."','".$mobileno."','".$institutionname."','".$institutionaddress."','".$city."','".$yearofstudy."','".$hodemail."','".$bookingid."')";
$result=mysqli_query($con,$query); 

    
    
    
if($result!=true){
    echo "Error2: ".mysqli_error($con)."<br>"; 
}
else
{
echo "<script>
        window.location = 'idform.php';
            </script>";    
    
      }

    }
}

?>
  
 


 
