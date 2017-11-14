<?php
require_once "connection.php";

if(isset($_POST) && sizeof($_POST))
{
	$station=$_POST['station'];
  $sql="select * from routes natural join rates where station_1 like '%$station%' or station_2 like '%$station%'";
  $result=mysqli_query($con, $sql);

  if(!isset($result)) echo "no routes found";
  else {

   ?>

<h2 align="center">Search results</h2>
   <table align="center" >
<tr >
<td><strong>ID</strong></td>
<td ><strong>Station1</strong></td>
<td><strong>Station2</strong></td>   <!-- creates table based on d search bar -->
<td><strong>Distance</strong></td>
<td><strong>Rate</strong></td>
<td><strong>Status</strong></td>
<td><strong></strong></td>
<td><strong></strong></td>
</tr>

<?php
while($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
{

?>
<tr>
<td><?php echo $rows['route_id']; ?></td>
<td><?php echo $rows['station_1']; ?></td>
<td><?php echo $rows['station_2']; ?></td>
<td><?php echo $rows['distance']; ?></td>
<td><?php echo $rows['normal_amt']; ?></td>
<td><?php if($rows['route_status']==1) echo "Enabled"; else echo"Disabled"; ?></td>
<td><a href="route_delete.php?id=<?php echo $rows['route_id']; ?>">delete</a><BR></td> <!-- sends member id to delete page-->
<td><a href="route_update.php?id=<?php echo $rows['route_id']; ?>">update</a><BR></td>
</tr>

<?php
}

}

}
?>
