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
$query="insert into industry(username,industry,category,statelocation,districtlocation,city,description,fromdate,todate,branch) values('".$username."','".$industry."','".$category."','".$statelocation."','".$districtlocation."','".$city."','".$description."','".$fromdate."','".$todate."','".$value."')";
$result=mysqli_query($con,$query); 

if($result!=true){
    echo "Error2: ".mysqli_error($con)."<br>"; 
}
else
{

echo "<script>window.location = 'indusdashboard.php';</script>";    
    
      }

    }
}

?>
  
 


 
