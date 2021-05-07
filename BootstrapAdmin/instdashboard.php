<?php
session_start();
if(empty($_SESSION['name']))
{
echo "<script>alert('Session Expired!!');
        window.location = 'login.html';
            </script>";
        
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eyeVee - Institute Dashboard</title>
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
                <li class="nav-item"><a href="logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
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
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Welcome,  <?php echo ucfirst($_SESSION['name']); ?></h2>
            </div>
          </header>
    
          <!-- Dashboard Header Section    -->
          <section class="dashboard-header">
            

          </section>
          <!-- Projects Section-->
            
            <?php
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");



if($con!=TRUE){
    echo "Error1"; 
}
                 $username=$_SESSION['name'];
                 $query = "SELECT * from industry";                           $result=mysqli_query($con,$query); 
                     
if(!$result) {
die('Could not enter data: ' . mysqli_error());
}
$count = mysqli_num_rows($result);
if ($count > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                     
        echo '      
        <section class="projects no-padding-top">
            <div class="container-fluid">
              <!-- Project-->
             <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="img/indus.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">' .$row["industry"].' , ' .$row["city"].'</h3><br>
                    <small >' .$row["description"] .'</small><br>
                      </div>
                    </div>
                    <div class="project-date" style="width:auto">
                <span class="hidden-sm-down">'.$row["fromdate"].'</span>
                </div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center" >
                   <div class="time" style="width:500px">'.$row["todate"] .'</div>
                    <div class="comments">'.$row["branch"].'</div>
<form method="post" action="bookingform.php">
<input type="hidden" id="snum" name="snum" 
value="'.$row["serialnumber"].'">
<input type="submit" value="Apply Now" 
id="'.$row["serialnumber"].'" class="dropdown-item edit"> 
</form>   
</div>
              </div></div>
              
                
                
                     
              
                </section>';
     }
} else {
     echo "0 results";
}

mysqli_close($con);
?>  
          
                
            
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>eyeVee &copy; 2018-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="" class="external">Team eyeVee</a></p>
                  
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>