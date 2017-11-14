<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']) )
{
  header("Location:../login.php");
exit;
}
if ($_SESSION['type']=='normal'){
  ?>
  <html>
  <body>
  welcome, <?php echo $_SESSION['username']; ?> you are a standard passenger | <a href="logout.php">Logout</a>
  </body>
  </html>
  <?php

}
else if($_SESSION['type']=='student'){
  header("Location:student_homepage.php");
}

?>
