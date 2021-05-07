<?php
session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }

//if(isset($_POST['submit'])){
  
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");
  
if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
   // $industry=$_SESSION['industry'];
//$description=$_SESSION['description'];
    $serialnumber=$_POST['snum'];
  
   $sql = "DELETE FROM industry WHERE serialnumber='$serialnumber' ";

if (mysqli_query($con, $sql)) {
echo "<script>alert('Offer deleted successfully');
        window.location = 'indusdashboard.php';
            </script>";     
     
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);


?>