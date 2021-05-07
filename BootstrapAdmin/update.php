<?php
session_start();
        
 if(empty($_SESSION['name']))
    {

echo "<script>window.location = 'login.html';</script>";
    }

if(isset($_POST['submit'])){
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");


if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
     
if(!empty($_POST['branch'])) {
$username=$_SESSION['name'];
$industry=$_POST['industry'];
$category=$_POST['category'];
$statelocation=$_POST['statelocation'];
$districtlocation=$_POST['districtlocation'];
$city=$_POST['city'];
$description=$_POST['description'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
$checkbox1=$_POST['branch'];  
$value1="";  
    $value= " ";
foreach($checkbox1 as $value1) {
    $value .=$value1.",";
}
    
$ssss=$_SESSION['sss'];
$query=" UPDATE industry SET 
username = '".$username."',industry = '".$industry."',category = '".$category."',statelocation = '".$statelocation."',districtlocation='".$districtlocation."',city='".$city."',description='".$description."',fromdate='".$fromdate."',todate='".$todate."',branch='".$value."'
WHERE serialnumber='$ssss'";

$result=mysqli_query($con,$query); 

if($result!=true){
   
    
    echo "Error: " . mysqli_error($con);
}
else
{

echo "<script>alert('Offer Updated Successfully!');
        window.location = 'indusdashboard.php';
            </script>";

    
}
      }

    }

?>
  
 


 
