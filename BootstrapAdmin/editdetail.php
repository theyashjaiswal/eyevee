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
    <title>eyeVee - Edit offer details</title>
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
                    <li><a href="indusdashboard.php"> <i class="icon-home"></i>Home </a></li>
                    <li class="active"><a href="upload.php"> <i class="icon-padnote"></i>Edit Offer </a></li>
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
              <h2 class="no-margin-bottom">Edit Offer</h2>
            </div>
          </header>
          <!-- Breadcrumb
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Forms            </li>
            </ul>
          </div>-->
          <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                
                <!-- Form Elements -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                      
                      
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
                            if(!$result) {
               die('Could not enter data: ' . mysqli_error());
} 
                       
$row = mysqli_fetch_assoc($result); 
   
                        
                          
            echo'  <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Fill in the details</h3>
                    </div>
                    <div class="card-body">
                      <form method="post" class="form-horizontal" action="update.php">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Industry </label>
                          <div class="col-sm-9">
                            <input type="text" name="industry" class="form-control" value="' .$row["industry"] .'">
                            </div>
                            <br><br>
                                   <div class="line"></div>
                            <label class="col-sm-3 form-control-label">Category</label>
                          <div class="col-sm-9">
                            <input type="text" name="category" class="form-control" value="' .$row["category"] .'">
                            </div>
                            <br><br> </div>
                                 <div class="line"></div>
                    <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Location</label>
                        <div class="col-sm-9 select">
                        <div class="resp_code frms">
                        <div id="selection">
                            <select id="listBox" name="statelocation" value="statelocation" onchange="selct_district(this.value)"></select>
                            <select id="secondlist" name="districtlocation" value="districtlocation"></select>
                          </div>
                        </div>
                            </div>
                                
                      <label class="col-sm-3 form-control-label">City/Town/Village</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city" value="' .$row["city"] .'">
                            </div>
                          </div>
                          
                               <div class="line"></div>
                          
                      <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Description</label>
                          <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" value="' .$row["description"] .'">
                            </div>
                            <br><br><br> </div>
                            
                             <div class="container">
            <div class="form-group row">        
            <label class="col-sm-3 form-control-label">Select the slot available<br><small class="text-primary">From & To Dates</small></label>              
                          
              </div></div> 
              
               <div class="container">
                               <div class="form-group row">
                          <label class="col-sm-3 form-control-label">From<br></label>
             &nbsp; &nbsp; &nbsp;                      
            <input type="date" name="fromdate">
    
                                  </div>
                                  
                                    <div class="form-group row">
          <label class="col-sm-3 form-control-label">To<br></label>
            <div class="col-md-5">
        <div class="form-group">
            
           &nbsp;  <input type="date" name="todate">
        </div>
    </div>
</div>
                            
                            
                            
                            
                          
                          <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Relevance Criteria<br><small class="text-primary">Select the eligible disciplines</small></label>
                          <div class="col-sm-9">
                            <div class="i-checks">
                              <input id="Aerospace" name="branch[]"  type="checkbox" value="Aerospace and Aeronautical Sciences" class="checkbox-template">
                              <label for="Aerospace">Aerospace and Aeronautical Sciences</label>
                            </div>
                            <div class="i-checks">
                              <input id="Biotechnology" name="branch[]" type="checkbox" value="Biotechnological Sciences" checked="" class="checkbox-template">
                              <label for="Biotechnology">Biotechnological Sciences</label>
                            </div>
                           <div class="i-checks">
                              <input id="Agriculture" name="branch[]" type="checkbox" value="Agricultural Sciences" checked="" class="checkbox-template">
                              <label for="Agriculture">Agricultural Sciences</label>
                            </div>
                               <div class="i-checks">
                              <input id="Chemical" name="branch[]" type="checkbox" value="Chemical Sciences" checked="" class="checkbox-template">
                              <label for="Chemical">Chemical Sciences</label>
                            </div>
                               <div class="i-checks">
                              <input id="Civil" name="branch[]" type="checkbox" value="Civil and Construction Sciences" checked="" class="checkbox-template">
                              <label for="Civil">Civil and Construction Sciences.</label>
                            </div>
                               <div class="i-checks">
                        <input id="Computer Science and Information Technology" name="branch[]" type="checkbox" value="Computer Science and Information Technology" checked="" class="checkbox-template">
                              <label for="CSIT">Computer Science and Information Technology</label>
                            </div>
                                <div class="i-checks">
                              <input id="ECE" name="branch[]" type="checkbox" value="Electronics and Communications" checked="" class="checkbox-template">
                              <label for="ECE">Electronics and Communications</label>
                            </div>
                                 <div class="i-checks">
                              <input id="EEE" name="branch[]" type="checkbox" value="Electrical Sciences" checked="" class="checkbox-template">
                              <label for="EEE">Electrical Sciences</label>
                            </div>                           
                            <div class="i-checks">
                              <input id="EIE" name="branch[]" type="checkbox" value="Electronics and Instrumentation" checked="" class="checkbox-template">
                              <label for="EIE">Electronics and Instrumentation</label>
                            </div>
                              <div class="i-checks">
                              <input id="Mechanical" name="branch[]" type="checkbox" value="Mechanical Sciences" checked="" class="checkbox-template">
                              <label for="Mechanical">Mechanical Sciences</label>
                            </div>
                               <div class="i-checks">
                              <input id="MBA" name="branch[]" type="checkbox" value="Management and Business Training(MBA)" checked="" class="checkbox-template">
                              <label for="MBA">Management and Business Training(MBA)</label>
                            </div>
                          </div>
                        </div>
                              
                         
                   
                                 <div class="line"></div>
                             <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                          </div>
                        </div>
                         
                             </form>
                                  
                                 
                      </div>
                    </div>
      </div>
    </div>'?>
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