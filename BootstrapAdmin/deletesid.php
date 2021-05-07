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

    $studentid=$_POST['sid'];
  
   $sql = "DELETE FROM studentdetails WHERE studentid='$studentid' ";

if (mysqli_query($con, $sql)) {
echo "<script>window.location = 'idform.php';
            </script>";    

} else {
    echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);


?>