<?php
require_once "connection.php";

$id = $_GET['id'];
$sql = "SELECT username from user where username='".$id."'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
	
   echo "Username is unavailable";
} else {
	echo "Username is available";
}
mysqli_close($con);

?>
