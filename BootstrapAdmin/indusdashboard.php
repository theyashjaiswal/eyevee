
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
    <title>eyeVee - Industry Dashboard</title>
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
            <form id="searchForm" action="search.php" role="search">
              <input type="text" name="query" placeholder="What are you looking for..." class="form-control">
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

<!-- Upload offer-->
                   &nbsp; &nbsp; &nbsp;
                  <li class="nav-item d-flex align-items-center"><a id="upload" href="upload.php"> <i class="fa fa-upload"></i></a>  </li>





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
                    <li class="active"><a href="indusdashboard.php"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="upload.php"> <i class="icon-padnote"></i>Upload Offer </a></li>
                    
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
          <!-- Dashboard Counts Section-->
         <section class="dashboard-counts no-padding-bottom">
           <!-- <div class="container-fluid">
              <div class="row bg-white has-shadow">
                    <div class="text">
                <small><a href="upload.php">Upload new Offer?</a></small>
                  </div>  
              </div>
            </div>-->
          </section>
            
          <!-- Dashboard Header Section  -->
          <!-- <section class="dashboard-header">


          </section> -->
          <!-- Projects Section -->
          <section class="projects no-padding-top">
            <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Uploaded offers</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped table-hover" width="100%">
                        <thead>
                          <tr>
                            <th>Industry</th>
                            <th>Category</th>
                              <th>State</th>
                              <th>District</th>
                            <th>City</th>  
                            <th>Description</th>
                              <th>From</th>
                                 <th>To</th>
                                 <th>Branch</th>
                              <th>Actions </th>
                          </tr>
                        </thead>
                        <tbody>
    <?php
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");



if($con!=TRUE){
    echo "Error1: ".mysqli_error($con)."<br>"; 
}
                              $username=$_SESSION['name'];
                              $query = "SELECT serialnumber,industry,category,statelocation,districtlocation,city,description,fromdate,todate,branch from industry WHERE username='$username'";
                              $result=mysqli_query($con,$query); 
                            if(!$result) {
               die('Could not enter data: ' . mysqli_error());
}
                    $count = mysqli_num_rows($result);
if ($count > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                  <td scope="row">' .$row["industry"]. '</td>
                  <td>' .$row["category"] .'</td>
                 <td>' .$row["statelocation"] .'</td>
                    <td>' .$row["districtlocation"] .'</td>
                  <td>' .$row["city"].'</td>
                  <td> '.$row["description"] .'</td>
                  <td> '.$row["fromdate"] .'</td>
                  <td> '.$row["todate"] .'</td>
            <td>'.$row["branch"].'</td> 
              
                  <td> 
                   
                   
                   
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                       
                    <form method="post" action="editdetail.php">
                   <input type="hidden" id="snum" name="snum" value="' .$row["serialnumber"] .'">
                   <input type="submit" value="Edit" id="' .$row["serialnumber"] .'" class="dropdown-item edit"> 
                           </form>   
                       
                        <form method="post" action="deletedetail.php">
                   <input type="hidden" id="snum" name="snum" value="' .$row["serialnumber"] .'">
                   <input type="submit" value="Delete" id="' .$row["serialnumber"] .'" class="dropdown-item edit"> 
                           </form>   
                       
                       
                        </div>
                        
                      </div>
                    </div>
                  
               
                      
                </td>
                </tr>';
     }
} else {
     echo "";
}

mysqli_close($con);
?>  
                          </tbody></table>
                          </div>
                  </div>
                </div>
            </section>
             <!--   <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    
                    </div>
            </div>
      </div>-->
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