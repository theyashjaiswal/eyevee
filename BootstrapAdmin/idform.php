<?php
 session_start();
 
 if(empty($_SESSION['name']))
    {
        // If they are not, redirect them to the login page.
        header("Location:login.html");
        
        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
       // die("Redirecting to login.php");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eyeVee - Add Student Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.green.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="dashboard.html" class="navbar-brand">
                  <div class="brand-text brand-big"><span>eyeVee -</span><strong> Industrial Visit</strong></div>
                  <div class="brand-text brand-small"><strong>iV</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
               
                <!-- Logout    -->
                <li class="nav-item"><a href="../index.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">

                
              <h1 class="h4">
                  <?php
                 
                    echo ucfirst($_SESSION['name']);
                  ?>
                </h1>

              <p>
                  <?php
                 echo $_SESSION['accounttype'];
                  ?>
                  </p>
                 
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="instdashboard.php"> <i class="icon-home"></i>Home </a></li>
                   
                    <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
                <!-- Modal Form--><div class="center-block">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Student Details Form</h3>
                    </div>
                    <div class="card-body text-center">
                      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Students</button>
                       
                      
                    
                        
                        
                        
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Add Student Detail</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Fill in the relevant details for each candidate</p>
                              <form method="post"  action="addstudent.php"  >
                                <div class="form-group">
                                  <label>ID</label>
                                  <input type="text" placeholder="University Roll/ID Number" name="studentid" class="form-control">
                                </div>
                                <div class="form-group">       
                                  <label>Name</label>
                                  <input type="text" name="studentname" placeholder="Student Name" class="form-control">
                                </div>
                               <div class="modal-footer">
                        
                                   <button type="submit" class="btn btn-primary" name="submit">Add</button>
                            </div> 
                              </form>
                            </div> 
                          
                            
                            
                            </div>
                            
                        </div>
                      </div>
                    </div>
                      
                     
         
                    <div class="card-body">
                      <table class="table table-striped table-hover" width="100%">
                        <thead>
                          <tr>
                            <th>Student ID</th>
                            <th>Studen Name</th>
                            <th>Industry for IV</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
    
<?php
  $con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");


if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
                             
            $bookingid=$_SESSION['bookingidnum'];  
                            
                            
            $query = "SELECT studentid,studentname,forindustry from studentdetails WHERE bookingid='$bookingid'";
            $result=mysqli_query($con,$query); 
                            
                 if(!$result) {
               die('Could not enter data: ' . mysqli_error());
}
                    $count = mysqli_num_rows($result);
if ($count > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                  <td scope="row">' .$row["studentid"]. '</td>
                  <td>' .$row["studentname"] .'</td>
                  <td>' .$row["forindustry"] .'</td>
                <td>
                 
                  
                       
                   <form method="post" action="deletesid.php">
                   <input type="hidden" id="sid" name="sid" value="' .$row["studentid"] .'">
                   <input type="submit" value="Delete" id="' .$row["studentid"] .'" class="dropdown-item edit"> 
                           </form>  
                         
                       
                       
               
                
                 
                  <td>
                </tr>';
     }
} else {
     echo "";
}

                       
echo'  
<p align="right">
    <form method="post" action="msg91sms.php" align="right">
    <input type="hidden" id="bid" name="bid" value="' .$_SESSION['bookingidnum'] .'">
    <input type="submit" value="Next Step" id="' .$_SESSION['bookingidnum'] .'" class="btn btn-primary"> 
                           </form> </p>';
                        
                        
       mysqli_close($con);
?>  
                   
                        
                         </tbody></table>
                          </div>
                  </div>
                </div>
        
                      
                      
                  </div>
            
            
            </div>
        
      
      
      
      
      
      
      
      
      
      
      
      </div>
      
      
      
      
      
                <!-- Form Elements -->
         
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>