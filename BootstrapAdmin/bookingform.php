<?php
session_start();

 if(empty($_SESSION['name']))
    {

echo "<script>window.location = 'login.html';</script>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eyeVee - Enter the details for Industrial Visit</title>
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
                <!-- Navbar Brand --><a href="indusdashboard.php" class="navbar-brand">
                  <div class="brand-text brand-big"><span>eyeVee -</span><strong> Industrial Visit</strong></div>
                  <div class="brand-text brand-small"><strong>iV</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
               
                <!-- Logout    -->
                <li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
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
                    <li><a href="indusdashboard.php"> <i class="icon-home"></i>Home </a></li>
                    <li class="active"><a href="upload.php"> <i class="icon-padnote"></i>Booking Offer </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>More </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="tables.php">Delete Offer</a></li>
                        <li><a href="editdetail.php">Edit Offer</a></li>
                      </ul>
                    </li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Booking your Industrial Visit</h2>
            </div>
          </header>

<?php
 $con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");


if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
  $username=$_SESSION['name'];
  $serialnumber=$_POST['snum'];
  $_SESSION['sss']=$serialnumber;


  $query = "SELECT serialnumber,industry,category,statelocation,districtlocation,city,description,branch from industry WHERE serialnumber='$serialnumber'";
  $result=mysqli_query($con,$query);


$results=mysqli_fetch_array($result);
$_SESSION['offeruploadedbyindustry']=$results['industry'];

            
if(!$result) {
die('Could not enter data: ' . mysqli_error());
} 
                       
$row = mysqli_fetch_assoc($result); 
   
                        
                          
            echo' 
             <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                
                <!-- Form Elements -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="">Fill in the details for offer '.$row["industry"].'</h3>
                    </div>
                    <div class="card-body">
                      <form method="post" class="form-horizontal" action="bookingphp.php">
                          
                        <div class="form-group row">
                          
                            
                            <label class="col-sm-3 form-control-label">Mobile No. - +91</label>
                          <div class="col-sm-9">
                            <input type="number" pattern="[0-9]{10}" placeholder="7989434283"name="mobileno" class="form-control">
                            </div>
                            
                            
                                   <div class="line"></div>
                            <label class="col-sm-3 form-control-label">Institution Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="institutionname" class="form-control">
                            </div>
                            <br><br> </div>
                                 <div class="line"></div>
                    <div class="form-group row">
                   
                           <label class="col-sm-3 form-control-label">Institution Address</label>
                          <div class="col-sm-9">
                            <input type="text" name="institutionaddress" class="form-control">
                            </div> <br><br>
                        
                        
                      <label class="col-sm-3 form-control-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city">
                            </div>
                          </div>
                          
                               <div class="line"></div>
                          
                      <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Year of Study</label>
                          <div class="col-sm-9">
                            <input type="text" name="yearofstudy" class="form-control">
                            </div>
                          <br><br>
                             <label class="col-sm-3 form-control-label">HOD Email ID</label>
                          <div class="col-sm-9">
                            <input type="email" name="hodemail" class="form-control">
                            </div>
                          
                            <br><br><br> </div>
                          
                          
                          
                          
                              
                              
                   
                                 <div class="line"></div>
                             <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                    
                            <button type="submit" class="btn btn-primary" name="submit">Next</button>
                          </div>
                        </div>
                         
                             </form>
                      </div>
                    </div>
      </div>
                </div></div></section>
            
            
            '?>         
            
            
         
    <!-- Javascript files-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script src="js/states.js"></script>
 
                </body>
</html>