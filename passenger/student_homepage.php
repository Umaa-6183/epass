<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']) )
{
  header("Location:../login.php");
exit;
}
 if ($_SESSION['type']=='student'){
  ?>
  <html>
  <body>
  welcome, <?php echo $_SESSION['username']; ?> you are a student | <a href="logout.php">Logout</a>
  </body>
  </html>
  <?php

}
else if($_SESSION['type']=='normal'){
  header("Location:normal_homepage.php");
}

?>
