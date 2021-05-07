<!DOCTYPE html>
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

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eyeVee - Confirm OTP</title>
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
                <!-- Modal Form--><div class="center-block">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        
                       
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Confirm your Verification Code</h3>
                    </div>
                   
                        
                        
                      <!-- Modal-->
                      
                        
                            <div class="modal-body">
                           
                              <form method="post"  action="otpverify.php"  >
                               
<div class="container be-detail-container"  align="center" style="padding-left: 120px;">
    <div class="row">
        <div class="">
            <br>
            <img src="sms.jpeg" class="img-responsive" style="width:100px; height:100px;margin:0 auto;"><br>
            <br>
            <h1 class="text-center">Enter the Verification code</h1><br>
            <p class="lead" style="align:center"></p><p>An OTP has been sent to your Mobile Number <?php
                 echo $_SESSION['mobileno']; 
                $_SESSION['bookingidnumber']=$_SESSION['bookingid'];
                  ?> . Please enter the 6 digit OTP below to proceed your booking.</p>  <p></p>
        <br>
       
           <form method="post" id="veryfyotp" action="otpverify.php" >
                               
                <input type="text" class="form-control" name="otp" placeholder="Enter your OTP number" required="" style="width:auto">
              
                <button type="submit" class="btn btn-primary  pull-right col-sm-3">Verify</button>
          
            </form>
        <br><br>
        </div>
    </div>        
</div>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                             
                              </form>
                            </div> 
                          
                            
                            
                        
                            
                       
                      </div>
                    </div>
                      
                   
                        
                        
                        
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