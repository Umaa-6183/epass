<?php
require_once "connection.php";
$admin_id=1; // get admin id from session

//get form values from html page
$start=$_POST["start"];
$end=$_POST["end"];
$distance=$_POST["distance"];
$rate=$_POST["rate"];


//check if route is already present
$sql="select * from routes where station_1='$start' and station_2='$end' or station_1='$end' and station_2='$start' having route_status=1";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result,MYSQLI_BOTH);

if($rows) {
  ?>
  <script type="text/javascript"> alert("route already exist "); window.location.href="route_add.html";</script>
  <?php
} // if yes then display message

//if not then all this
else
 {
 $sql=" INSERT INTO routes(station_1,station_2,distance,admin_id,route_status) VALUES('$start','$end','$distance','$admin_id',1)";// insert route
$result=mysqli_query($con,$sql);

if($result)
{
   $sql="select route_id from routes where station_1='$start' and station_2='$end'";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_array($result,MYSQLI_BOTH);
    $r_id=$rows['route_id'];
    $snr_amt=$rate-($rate*(50/100));
    $nrml_amt=$rate;
    $std_amt=$rate-($rate*(50/100));
    $sql="insert into rates values('$snr_amt','$nrml_amt','$std_amt','$r_id')";//insert rate
     $result=mysqli_query($con,$sql);
     if($result)
     {
       $s=$start." to ".$end." has been added";
       ?>
                   <script>
                   alert("<?php echo $s;?>");
                   window.location.href="route_add.html";</script>
                   <?php
                   echo "successful";
                 }

          else  echo "error occurred";
}

 }

 ?>
