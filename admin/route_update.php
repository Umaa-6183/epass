<?php
require_once "connection.php";
$id=$_GET['id'];
$sql="select * from routes natural join rates where route_id='$id'";
$result=mysqli_query($con, $sql); $rows=mysqli_fetch_assoc($result);

?>


<html>
<h3>update form</h3>
<form method="post" action="update.php" name="update_form">
Station 1: <input type="text" name="station_1" placeholder="<?php echo $rows['station_1'];?>" ><br>
Station 2: <input type="text" name="station_2" placeholder="<?php echo $rows['station_2'];?>" ><br>
Distance: <input type="text" name="distance" placeholder="<?php echo $rows['distance'];?>" ><br>
Rate: <input type="text" name="rate" placeholder="<?php echo $rows['normal_amt'];?>" ><br>
Status:<select name="route_status" >
        <<option disabled="" selected="selected" >change route status</option>
        <option value="1">Enable</option><br />
        <option value="0">Disable</option><br  />


</select>
<input type="hidden" name="id" value="<?php echo $id; ?>" placeholder="<?php echo $id; ?>"><br />

  <input type="submit" name="update" value="update">
</form>
</html>
