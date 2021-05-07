 <?php
session_start();
  
// Delete certain session
  unset($_SESSION['name']);
  // Delete all session variables
  // session_destroy();

 // Jump to login page
echo "<script>window.location = 'login.html';</script>";

  ?>